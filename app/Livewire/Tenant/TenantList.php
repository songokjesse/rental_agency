<?php

namespace App\Livewire\Tenant;

use App\Models\Tenant;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class TenantList extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $confirmingTenantDeletion = false;
    public $tenantIdToDelete;

    public function confirmTenantDeletion($propertyId): void
    {
        $this->confirmingTenantDeletion = true;
        $this->tenantIdToDelete = $propertyId;
    }

    public function deleteProperty(): void
    {
        $tenant = Tenant::find($this->tenantIdToDelete);

        if ($tenant) {
            $tenant->delete();
            session()->flash('message', 'Tenant deleted successfully.');
        } else {
            session()->flash('error', 'Tenant not found.');
        }

        $this->confirmingTenantDeletion = false;
        $this->tenantIdToDelete = null;
    }


    #[Layout('layouts.app')]
    public function render()
    {
        $tenants = Tenant::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orWhere('id_number', 'like', '%' . $this->search . '%')
        ->orWhere('kra_pin', 'like', '%' . $this->search . '%')
        ->orWhere('phone_number', 'like', '%' . $this->search . '%')
        ->paginate(10);

        return view('livewire.tenant.tenant-list', [
            'tenants' => $tenants
        ]);
    }
}
