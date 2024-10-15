<?php

use function Livewire\Volt\{state, computed};
use App\Models\Landlord;
use Illuminate\Database\Eloquent\Builder;

state(['search' => '']);
state(['landlordToDelete' => null]);

$landlords = computed(function () {
    return Landlord::with('user')
        ->where(function (Builder $query) {
            $query->where('company_name', 'like', '%' . $this->search . '%')
                ->orWhere('phone_number', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
        })
        ->paginate(10);
});

$updatingSearch = fn () => $this->resetPage();

$addNewLandlord = function () {
    $this->dispatch('addNewLandlord');
};

$edit = function ($id) {
    $this->dispatch('editLandlord', $id);
};

$confirmDelete = function ($id) {
    $this->landlordToDelete = $id;
};

$cancelDelete = function () {
    $this->landlordToDelete = null;
};

$delete = function () {
    if ($this->landlordToDelete) {
        Landlord::destroy($this->landlordToDelete);
        $this->landlordToDelete = null;
        $this->dispatch('landlordDeleted');
    }
};

?>

<div>
    <div class="mb-4 flex justify-between">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Search by company name, phone number, landlord name or email" class="w-full px-4 py-2 border rounded-md">
        <button class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="addNewLandlord">Add New Landlord</button>
    </div>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Landlord Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($this->landlords as $landlord)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $landlord->user->name }} ({{ $landlord->user->email }})</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $landlord->company_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $landlord->phone_number }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <button wire:click="edit({{ $landlord->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">
                            Edit
                        </button>
                        <button wire:click="confirmDelete({{ $landlord->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center">No landlords found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $this->landlords->links() }}
    </div>

    @if($landlordToDelete)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Delete Confirmation</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">
                            Are you sure you want to delete this landlord? This action cannot be undone.
                        </p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button
                            id="ok-btn"
                            wire:click="delete"
                            class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300"
                        >
                            Delete
                        </button>
                        <button
                            id="cancel-btn"
                            wire:click="cancelDelete"
                            class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-24 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>