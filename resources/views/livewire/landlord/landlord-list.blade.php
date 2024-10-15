<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Landlord Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="mb-4 flex justify-between">
                            <input type="text" wire:model.live="searchTerm" placeholder="Search landlords..." class="px-3 py-2 border rounded">
                            <a href="{{ route('landlords.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add New Landlord
                            </a>
                        </div>
                        @if (session()->has('message'))
                            <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="mt-2">
                            <table class="min-w-full bg-white">
                                <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Landlord Name</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Landlord Email</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Company Name</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($landlords as $landlord)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->user->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->user->email }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->company_name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->phone_number }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <a href="{{ route('landlords.edit', $landlord->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">
                                                Edit
                                            </a>
                                            <button type="button" wire:click="delete({{ $landlord->id }})" wire:confirm="Are you sure you want to delete this landlord '{{ $landlord->user->name }}'?"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4">
                                {{ $landlords->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--<div>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="text-xl font-semibold leading-tight text-gray-800">--}}
{{--            Landlord Management--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">--}}
{{--            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <div>--}}
{{--                        <div class="mb-4 flex justify-between">--}}
{{--                        <input type="text" wire:model.live="searchTerm" placeholder="Search landlords...">--}}
{{--                            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                                Add New Landlord--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="mt-2">--}}
{{--                            <table class="min-w-full bg-white">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User Name</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User Email</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Company Name</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($landlords as $landlord)--}}
{{--                                    <tr>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->user->name }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->user->email }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->company_name }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200">{{ $landlord->phone_number }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200">--}}
{{--                                            <button wire:click="edit({{ $landlord->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">--}}
{{--                                                Edit--}}
{{--                                            </button>--}}
{{--                                            <a href="{{ route('landlords.edit', $landlord->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">--}}
{{--                                                Edit--}}
{{--                                            </a>--}}
{{--                                            <button  type="button" wire:click="delete({{ $landlord->id }})"     wire:confirm="Are you sure you want to delete this landlord [{{ $landlord->user->name }}]?"--}}
{{--                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">--}}
{{--                                                Delete--}}
{{--                                            </button>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}

{{--                            <div class="mt-4">--}}
{{--                                {{ $landlords->links() }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
