<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $landlordId ? 'Edit Landlord' : 'Add New Landlord' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-bold text-gray-700">Name</label>
                            <input type="text" id="name" wire:model="name" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block mb-2 font-bold text-gray-700">Email</label>
                            <input type="email" id="email" wire:model="email" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block mb-2 font-bold text-gray-700">
                                Password
                                @if($landlordId)
                                    <span class="font-normal text-gray-500">(Leave blank to keep current password)</span>
                                @endif
                            </label>
                            <input type="password" id="password" wire:model="password" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="company_name" class="block mb-2 font-bold text-gray-700">Company Name</label>
                            <input type="text" id="company_name" wire:model="company_name" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @error('company_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="phone_number" class="block mb-2 font-bold text-gray-700">Phone Number</label>
                            <input type="text" id="phone_number" wire:model="phone_number" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @error('phone_number') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                {{ $landlordId ? 'Update Landlord' : 'Add Landlord' }}
                            </button>
                            <a href="{{ route('landlords.index') }}" class="px-4 py-2 font-bold text-white bg-gray-500 rounded hover:bg-gray-700 focus:outline-none focus:shadow-outline">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
