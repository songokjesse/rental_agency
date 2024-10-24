<div>
    {{-- Success is as dangerous as failure. --}}

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Utilities for Unit: {{ $unit->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Add New Utility</h2>
            <form wire:submit.prevent="addUtility" class="space-y-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Utility Type</label>
                    <input type="text" id="type" wire:model="newUtility.type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('newUtility.type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="meter_number" class="block text-sm font-medium text-gray-700">Meter Number</label>
                    <input type="text" id="meter_number" wire:model="newUtility.meter_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('newUtility.meter_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                    <textarea id="notes" wire:model="newUtility.notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    @error('newUtility.notes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Add Utility
                    </button>
                </div>
            </form>
        </div>

        <div>
            <h2 class="text-2xl font-semibold mb-4">Existing Utilities</h2>
            @if($utilities->isEmpty())
                <p class="text-gray-500">No utilities recorded for this unit.</p>
            @else
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul class="divide-y divide-gray-200">
                        @foreach($utilities as $utility)
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">{{ $utility->type }}</h3>
                                        <p class="text-sm text-gray-500">Meter Number: {{ $utility->meter_number ?? 'N/A' }}</p>
                                        <p class="text-sm text-gray-500">Notes: {{ $utility->notes ?? 'N/A' }}</p>
                                    </div>
                                    <button wire:click="deleteUtility({{ $utility->id }})" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Delete
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
        </div>
    </div>
</div>
