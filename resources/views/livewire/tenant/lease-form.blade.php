<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $leaseId ? 'Edit Lease' : 'Add New Lease' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form wire:submit.prevent="save" class="space-y-6">
                        <div>
                            <label for="unit_id" class="block text-sm font-medium text-gray-700">Unit</label>
                            <select wire:model="unit_id" id="unit_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Select a unit</option>
                                @foreach($availableUnits as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->unit_number }} - {{ $unit->property->name }}</option>
                                @endforeach
                            </select>
                            @error('unit_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" wire:model="start_date" id="start_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('start_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" wire:model="end_date" id="end_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('end_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="rent_amount" class="block text-sm font-medium text-gray-700">Rent Amount</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" wire:model="rent_amount" id="rent_amount" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" step="0.01">
                            </div>
                            @error('rent_amount') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="security_deposit" class="block text-sm font-medium text-gray-700">Security Deposit</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" wire:model="security_deposit" id="security_deposit" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" step="0.01">
                            </div>
                            @error('security_deposit') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input wire:model="is_active" id="is_active" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_active" class="font-medium text-gray-700">Is Active</label>
                                <p class="text-gray-500">Check if this lease is currently active.</p>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class=" flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ $leaseId ? 'Update Lease' : 'Create Lease' }}
                            </button>
                        </div>
                    </form>

{{--                    <form wire:submit.prevent="save" class="space-y-6">--}}
{{--                        <div>--}}
{{--                            <label for="unit_id" class="block text-sm font-medium text-gray-700">Unit</label>--}}
{{--                            <select wire:model="unit_id" id="unit_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">--}}
{{--                                <option value="">Select a unit</option>--}}
{{--                                @foreach($availableUnits as $unit)--}}
{{--                                    <option value="{{ $unit->id }}">{{ $unit->unit_number }} - {{ $unit->property->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('unit_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="tenant_id" class="block text-sm font-medium text-gray-700">Tenant</label>--}}
{{--                            <select wire:model="tenant_id" id="tenant_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">--}}
{{--                                <option value="">Select a tenant</option>--}}
{{--                                @foreach($tenants as $tenant)--}}
{{--                                    <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('tenant_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>--}}
{{--                            <input type="date" wire:model="start_date" id="start_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--                            @error('start_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>--}}
{{--                            <input type="date" wire:model="end_date" id="end_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--                            @error('end_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="rent_amount" class="block text-sm font-medium text-gray-700">Rent Amount</label>--}}
{{--                            <div class="mt-1 relative rounded-md shadow-sm">--}}
{{--                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">--}}
{{--                                    <span class="text-gray-500 sm:text-sm">$</span>--}}
{{--                                </div>--}}
{{--                                <input type="number" wire:model="rent_amount" id="rent_amount" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" step="0.01">--}}
{{--                            </div>--}}
{{--                            @error('rent_amount') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="security_deposit" class="block text-sm font-medium text-gray-700">Security Deposit</label>--}}
{{--                            <div class="mt-1 relative rounded-md shadow-sm">--}}
{{--                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">--}}
{{--                                    <span class="text-gray-500 sm:text-sm">$</span>--}}
{{--                                </div>--}}
{{--                                <input type="number" wire:model="security_deposit" id="security_deposit" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" step="0.01">--}}
{{--                            </div>--}}
{{--                            @error('security_deposit') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div class="flex items-start">--}}
{{--                            <div class="flex items-center h-5">--}}
{{--                                <input wire:model="is_active" id="is_active" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">--}}
{{--                            </div>--}}
{{--                            <div class="ml-3 text-sm">--}}
{{--                                <label for="is_active" class="font-medium text-gray-700">Is Active</label>--}}
{{--                                <p class="text-gray-500">Check if this lease is currently active.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <button type="submit" class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                                {{ $leaseId ? 'Update Lease' : 'Create Lease' }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
</div>
        </div>
    </div>
</div>

