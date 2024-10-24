<?php

namespace App\Livewire\Tenant;

use App\Models\Lease;
use App\Models\Tenant;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LeaseList extends Component
{
    public $tenantId;

    #[Layout('layouts.app')]
    public function render(): View|Factory|Application
    {
        $tenant = Tenant::findOrFail($this->tenantId);
        return view('livewire.tenant.lease-list',[
            'tenant' => $tenant,
            'leases' => Lease::where('tenant_id', $this->tenantId)
                ->paginate(10),
        ]);
    }
}
