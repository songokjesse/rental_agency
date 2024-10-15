<?php

namespace App\Livewire\Landlord;

use App\Models\Landlord;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LandlordList extends Component
{
    public $searchTerm;

    #[Layout('layouts.app')]
    public function render(): View|Factory|Application
    {
        $landlords = Landlord::where('company_name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('phone_number', 'like', '%' . $this->searchTerm . '%')
            ->paginate(25);

        return view('livewire.landlord.landlord-list', compact('landlords'));
    }


    public function delete(int $id): void
    {
        $landlord = Landlord::findOrFail($id);
        $landlord->delete();
        session()->flash("message", "Landlord deleted successfully.");
    }


}
