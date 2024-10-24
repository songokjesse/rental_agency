<?php

namespace App\Livewire\Tenant;

use App\Models\Lease;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LeaseForm extends Component
{
    public $leaseId;
    public $tenantId;
    public $unit_id;
    public $start_date;
    public $end_date;
    public $rent_amount;
    public $security_deposit;
    public $is_active = true;

    public $availableUnits;
    public $tenant;

    protected function rules()
    {
        return [
            'unit_id' => ['required', 'exists:units,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'rent_amount' => ['required', 'numeric', 'min:0'],
            'security_deposit' => ['required', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
        ];
    }

    public function mount($tenantId, $leaseId = null)
    {
        $this->tenantId = $tenantId;
        $this->leaseId = $leaseId;
        $this->tenant = Tenant::findOrFail($tenantId);
        $this->loadAvailableUnits();

        if ($leaseId) {
            $lease = Lease::findOrFail($leaseId);
            $this->unit_id = $lease->unit_id;
            $this->start_date = $lease->start_date->format('Y-m-d');
            $this->end_date = $lease->end_date->format('Y-m-d');
            $this->rent_amount = $lease->rent_amount;
            $this->security_deposit = $lease->security_deposit;
            $this->is_active = $lease->is_active;
        }
    }

    public function loadAvailableUnits()
    {
        $this->availableUnits = Unit::where('status', 'available')
            ->orWhere(function ($query) {
                $query->where('status', 'occupied')
                    ->whereHas('leases', function ($q) {
                        $q->where('id', $this->leaseId);
                    });
            })
            ->with('property')
            ->get();
    }

    public function save()
    {
        $this->validate();

        DB::transaction(function () {
            $leaseData = $this->getLeaseData();

            if ($this->leaseId) {
                $lease = Lease::findOrFail($this->leaseId);
                $oldUnitId = $lease->unit_id;
                $lease->update($leaseData);

                if ($oldUnitId != $this->unit_id) {
                    Unit::where('id', $oldUnitId)->update(['status' => 'available']);
                }

                session()->flash('message', 'Lease updated successfully.');
            } else {
                Lease::create($leaseData);
                session()->flash('message', 'Lease created successfully.');
            }

            // Update the new unit's status to 'occupied'
            Unit::where('id', $this->unit_id)->update(['status' => 'occupied']);
        });

        return redirect()->route('leases.list', ['tenantId' => $this->tenantId]);
    }

    private function getLeaseData()
    {
        return [
            'tenant_id' => $this->tenantId,
            'unit_id' => $this->unit_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'rent_amount' => $this->rent_amount,
            'security_deposit' => $this->security_deposit,
            'is_active' => $this->is_active,
        ];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tenant.lease-form')
            ->layout('layouts.app', ['title' => $this->leaseId ? 'Edit Lease' : 'Add Lease']);
    }

}
