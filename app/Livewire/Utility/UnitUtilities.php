<?php

namespace App\Livewire\Utility;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Unit;
use App\Models\Utility;

class UnitUtilities extends Component
{
    public $unit;
    public $utilities;
    public $newUtility = [
        "type" => "",
        "meter_number" => "",
        "notes" => "",
    ];

    protected $rules = [
        "newUtility.type" => "required|string",
        "newUtility.meter_number" => "nullable|string",
        "newUtility.notes" => "nullable|string",
    ];

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->loadUtilities();
    }

    public function loadUtilities()
    {
        $this->utilities = $this->unit->utilities;
    }

    public function addUtility()
    {
        $this->validate();

        $this->unit->utilities()->create($this->newUtility);
        $this->newUtility = [
            "type" => "",
            "meter_number" => "",
            "notes" => "",
        ];
        $this->loadUtilities();
    }

    public function deleteUtility($utilityId): void
    {
        Utility::destroy($utilityId);
        $this->loadUtilities();
    }

    #[Layout("layouts.app")]
    public function render()
    {
        return view("livewire.utlity.unit-utilities", [
            "title" => "Unit Utilities",
        ]);
    }
}
