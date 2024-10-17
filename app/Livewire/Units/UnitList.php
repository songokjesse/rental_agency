<?php

namespace App\Livewire\Units;

use App\Models\Property;
use App\Models\Unit;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class UnitList extends Component
{
    use WithPagination;

    public $propertyId;
    public $search = '';

    protected $queryString = ['search'];

    public function mount($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $property = Property::findOrFail($this->propertyId);

        return view('livewire.units.unit-list', [
            'property' => $property,
            'units' => Unit::where('property_id', $this->propertyId)
                ->where(function ($query) {
                    $query->where('unit_number', 'like', '%' . $this->search . '%')
                        ->orWhere('bedrooms', 'like', '%' . $this->search . '%')
                        ->orWhere('bathrooms', 'like', '%' . $this->search . '%')
                        ->orWhere('rent_amount', 'like', '%' . $this->search . '%');
                })
                ->paginate(10),
        ]);
    }
}

