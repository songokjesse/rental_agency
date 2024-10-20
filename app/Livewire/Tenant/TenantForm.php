<?php

namespace App\Livewire\Tenant;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TenantForm extends Component
{
    public $tenantId;
    public $user_id;
    public $name;
    public $email;
    public $phone_number;
    public $id_number;
    public $kra_pin;
    public $emergency_contact;

    public $users;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tenants,email,' . $this->tenantId,
            'phone_number' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:tenants,id_number,' . $this->tenantId,
            'kra_pin' => 'required|string|max:255|unique:tenants,kra_pin,' . $this->tenantId,
            'emergency_contact' => 'required|string|max:255',
        ];
    }

    public function mount($id = null)
    {
        $this->tenantId = $id;

        if ($id) {
            $tenant = Tenant::findOrFail($id);
            $this->name = $tenant->name;
            $this->email = $tenant->email;
            $this->phone_number = $tenant->phone_number;
            $this->id_number = $tenant->id_number;
            $this->kra_pin = $tenant->kra_pin;
            $this->emergency_contact = $tenant->emergency_contact;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->tenantId) {
            $tenant = Tenant::findOrFail($this->tenantId);
            $tenant->update($this->getTenantData());
            session()->flash('message', 'Tenant updated successfully.');
        } else {
            Tenant::create($this->getTenantData());
            session()->flash('message', 'Tenant created successfully.');
        }

        return redirect()->route('tenants.index');
    }

    private function getTenantData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'id_number' => $this->id_number,
            'kra_pin' => $this->kra_pin,
            'emergency_contact' => $this->emergency_contact,
        ];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tenant.tenant-form')
            ->layout('layouts.app', ['title' => $this->tenantId ? 'Edit Tenant' : 'Add Tenant']);
    }
}
