<?php

namespace App\Livewire\Landlord;

use App\Models\Landlord;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LandlordForm extends Component
{
    public $landlordId;
    public $name;
    public $email;
    public $password;
    public $company_name;
    public $phone_number;

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->landlordId ? Landlord::find($this->landlordId)->user_id : null),
            ],
            'company_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ];

        if (!$this->landlordId) {
            $rules['password'] = 'required|min:8';
        } else {
            $rules['password'] = 'nullable|min:8';
        }

        return $rules;
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->landlordId = $id;
            $landlord = Landlord::findOrFail($id);
            $this->name = $landlord->user->name;
            $this->email = $landlord->user->email;
            $this->company_name = $landlord->company_name;
            $this->phone_number = $landlord->phone_number;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->landlordId) {
            $landlord = Landlord::findOrFail($this->landlordId);
            $user = $landlord->user;
        } else {
            $user = new User();
        }

        $user->name = $this->name;
        $user->email = $this->email;
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        if (!$this->landlordId) {
            $landlord = new Landlord();
            $landlord->user_id = $user->id;
        }

        $landlord->company_name = $this->company_name;
        $landlord->phone_number = $this->phone_number;
        $landlord->save();

        session()->flash('message', $this->landlordId ? 'Landlord updated successfully.' : 'Landlord added successfully.');
        return redirect()->route('landlords.index');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.landlord.landlord-form');
    }
}
