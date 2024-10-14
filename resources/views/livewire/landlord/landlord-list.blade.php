<?php

use function Livewire\Volt\{state, computed};
use App\Models\Landlord;

state(['search' => '']);

$landlords = computed(function () {
    return Landlord::with('user')
        ->where('company_name', 'like', '%'. $this->search. '%')
        ->orWhere('phone_number', 'like', '%'. $this->search. '%')
        ->orWhereHas('user', function ($query) {
            $query->where('name', 'like', '%'. $this->search. '%')
                  ->orWhere('email', 'like', '%'. $this->search. '%');
        })
        ->paginate(10);
});

$updatingSearch = fn () => $this->resetPage();

$addNewLandlord = function () {
    $this->dispatch('addNewLandlord');
};

?>

<div>
    <div class="mb-4 flex justify-between">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Search by company name or phone number" class="w-full px-4 py-2 border rounded-md">
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
                        <button wire:click="delete({{ $landlord->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center">No landlords found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $this->landlords->links() }}
    </div>
</div>