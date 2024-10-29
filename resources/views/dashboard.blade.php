<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">Total Properties</h2>
                    <p class="text-3xl font-bold">25</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">Occupancy Rate</h2>
                    <p class="text-3xl font-bold">92%</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">Total Monthly Rent</h2>
                    <p class="text-3xl font-bold">$52,000</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">Outstanding Payments</h2>
                    <p class="text-3xl font-bold">$4,200</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Recent Activity</h2>
                <ul class="divide-y divide-gray-200">
                    <li class="py-4">
                        <p class="text-sm font-medium text-gray-900">New lease signed</p>
                        <p class="text-sm text-gray-500">Tenant John Doe signed a new lease for Apartment 4B</p>
                    </li>
                    <li class="py-4">
                        <p class="text-sm font-medium text-gray-900">Payment received</p>
                        <p class="text-sm text-gray-500">$1,200 received from Tenant Jane Smith for Apartment 2A</p>
                    </li>
                    <li class="py-4">
                        <p class="text-sm font-medium text-gray-900">Maintenance request</p>
                        <p class="text-sm text-gray-500">New maintenance request for Apartment 3C: Leaky faucet</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
