<?php

namespace App\Livewire\Property;

use AllowDynamicProperties;
use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyList extends Component
{
    use WithPagination;
    public string $search ="";
    public bool $confirmingPropertyDeletion = false;
    public $propertyIdToDelete;

    public function confirmPropertyDeletion($propertyId): void
    {
        $this->confirmingPropertyDeletion = true;
        $this->propertyIdToDelete = $propertyId;
    }

    public function deleteProperty(): void
    {
        $property = Property::find($this->propertyIdToDelete);

        if ($property) {
            $property->delete();
            session()->flash('message', 'Property deleted successfully.');
        } else {
            session()->flash('error', 'Property not found.');
        }

        $this->confirmingPropertyDeletion = false;
        $this->propertyIdToDelete = null;
    }

    #[Layout('layouts.app')]
    public function render(): View|Factory|Application
    {
        $properties = Property::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('address', 'like', '%' . $this->search . '%')
        ->orWhere('property_type', 'like', '%' . $this->search . '%')
        ->orWhere('estate', 'like', '%' . $this->search . '%')
        ->orWhere('town', 'like', '%' . $this->search . '%')
        ->orWhere('county', 'like', '%' . $this->search . '%')
        ->withCount('units')
        ->paginate(10);
        return view('livewire.property.property-list', [
           'properties' => $properties,
        ]);
    }
}

