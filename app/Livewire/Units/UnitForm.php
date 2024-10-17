<?php

namespace App\Livewire\Units;

use App\Enums\UnitStatus;
use App\Models\Property;
use App\Models\Unit;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UnitForm extends Component
{
    public $unitId;
    public $unit_number;
    public $property_id;
    public $bathrooms;
    public $bedrooms;
    public $rent_amount;
    public $status;
    public $properties;
    public $statuses;


    protected function rules()
    {
        return [
            'unit_number' => 'required|string|max:255',
            'property_id' => 'required|exists:properties,id',
            'bedrooms' => 'required|integer|max:255',
            'bathrooms' => 'required|integer|max:255',
            'rent_amount' => 'required|string|max:255',
            'status' => ['required', 'string', 'in:' . implode(',', UnitStatus::values())],
        ];
    }

    public function mount($unitId = null, $propertyId = null)
    {
        $this->unitId = $unitId;
        $this->properties = Property::all();
        $this->statuses = UnitStatus::cases();


        if ($unitId) {
            $unit = Unit::findOrFail($unitId);
            $this->unit_number = $unit->unit_number;
            $this->property_id = $unit->property_id;
            $this->bedrooms = $unit->bedrooms;
            $this->bathrooms = $unit->bathrooms;
            $this->rent_amount = $unit->rent_amount;
            $this->status = $unit->status->value;
        } elseif ($propertyId) {
            $this->property_id = $propertyId;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->unitId) {
            $unit = Unit::findOrFail($this->unitId);
            $unit->update($this->getUnitData());
            session()->flash('message', 'Unit updated successfully.');
        } else {
            Unit::create($this->getUnitData());
            session()->flash('message', 'Unit created successfully.');
        }

        return redirect()->route('units.list', ['propertyId' => $this->property_id]);
    }

    private function getUnitData(): array
    {
        return [
            'unit_number' => $this->unit_number,
            'property_id' => $this->property_id,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'rent_amount' => $this->rent_amount,
            'status' => UnitStatus::from($this->status),
        ];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.units.unit-form')
            ->layout('layouts.app', ['title' => $this->unitId ? 'Edit Unit' : 'Add Unit']);
    }

}
