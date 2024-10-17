<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Units for {{ $property->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <div class="mb-4 flex justify-between items-center">
                    <input wire:model.debounce.300ms="search" type="text" placeholder="Search units..." class="px-4 py-2 border rounded-md">
                    <a href="{{ route('units.create', $property->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Unit
                    </a>
                </div>
                    @if (session()->has('message'))
                        <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('message') }}
                        </div>
                    @endif

                <table class="min-w-full bg-white">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Property Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Unit Number</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bedrooms</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bathrooms</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rent Amount</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($units as $unit)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $property->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $unit->unit_number }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $unit->bedrooms }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $unit->bathrooms }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $unit->rent_amount }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $unit->status }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <a href="{{ route('units.edit', ['propertyId' => $property->id, 'unitId' => $unit->id]) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                <button wire:click="confirmUnitDeletion({{ $unit->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $units->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
