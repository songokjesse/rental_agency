<?php

namespace App\Livewire\Property;

use Livewire\Component;
use App\Models\Property;
use App\Models\Landlord;
use Illuminate\Validation\Rule;
class PropertyForm extends Component
{
    public $propertyId;
    public $name;
    public $address;
    public $landlord_id;
    public $property_type;
    public $estate;
    public $town;
    public $county;

    public $landlords;

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'landlord_id' => 'required|exists:landlords,id',
        'property_type' => 'required|string|max:255',
        'estate' => 'nullable|string|max:255',
        'town' => 'required|string|max:255',
        'county' => 'required|string|max:255',
    ];

    public function mount($id = null)
    {
        $this->propertyId = $id;
        $this->landlords = Landlord::all();

        if ($id) {
            $property = Property::findOrFail($id);
            $this->name = $property->name;
            $this->address = $property->address;
            $this->landlord_id = $property->landlord_id;
            $this->property_type = $property->property_type;
            $this->estate = $property->estate;
            $this->town = $property->town;
            $this->county = $property->county;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->propertyId) {
            $property = Property::findOrFail($this->propertyId);
            $property->update($this->getPropertyData());
            session()->flash('message', 'Property updated successfully.');
        } else {
            Property::create($this->getPropertyData());
            session()->flash('message', 'Property created successfully.');
        }

        return redirect()->route('properties.index');
    }

    private function getPropertyData()
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'landlord_id' => $this->landlord_id,
            'property_type' => $this->property_type,
            'estate' => $this->estate,
            'town' => $this->town,
            'county' => $this->county,
        ];
    }

    public function render()
    {
        return view('livewire.property.property-form')
            ->layout('layouts.app', ['title' => $this->propertyId ? 'Edit Property' : 'Add Property']);
    }

}

