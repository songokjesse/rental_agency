<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $unitId ? 'Edit Unit' : 'Add New Unit' }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

        <form wire:submit.prevent="save" class="space-y-6">


            <div>
                <label for="property_id" class="block text-sm font-medium text-gray-700">Property</label>
                <select wire:model="property_id" id="property_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select a property</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </select>
                @error('property_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="unit_number" class="block text-sm font-medium text-gray-700">Unit Number</label>
                <input type="text" wire:model="unit_number" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('unit_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="rebate_amount" class="block text-sm font-medium text-gray-700">Rent Amount</label>
                <input type="text" wire:model="rent_amount" id="rent_amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('rent_amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="bedrooms" class="block text-sm font-medium text-gray-700">Bedrooms</label>
                <input type="text" wire:model="bedrooms" id="bedrooms" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('bedrooms') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="bathrooms" class="block text-sm font-medium text-gray-700">Bathrooms</label>
                <input type="text" wire:model="bathrooms" id="bathrooms" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('bathrooms') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>


            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select wire:model="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select a status</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->value }}">{{ ucfirst(str_replace('_', ' ', $status->value)) }}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

{{--            <div>--}}
{{--                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>--}}
{{--                <select wire:model="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">--}}
{{--                    <option value="">Select a status</option>--}}
{{--                    <option value="available">Available</option>--}}
{{--                    <option value="occupied">Occupied</option>--}}
{{--                    <option value="maintenance">Under Maintenance</option>--}}
{{--                </select>--}}
{{--                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror--}}
{{--            </div>--}}

            <div>
                <button type="submit" class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ $unitId ? 'Update Unit' : 'Add Unit' }}
                </button>
            </div>
        </form>
    </div>

                </div>
            </div>
        </div>
    </div>
