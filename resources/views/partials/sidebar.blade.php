<aside class="w-64 h-screen bg-gray-800 text-white">
    <div class="p-4">
        <h2 class="text-2xl font-semibold">PropManager</h2>
    </div>
    <nav class="mt-6">
        <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
        </a>
        <a href="{{ route('properties.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('properties.*') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-building mr-2"></i> Properties
        </a>
        <a href="{{ route('tenants.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('tenants.*') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-users mr-2"></i> Tenants
        </a>
        <a href="#" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('leases.*') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-file-contract mr-2"></i> Leases
        </a>
{{--        <a href="{{ route('leases.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('leases.*') ? 'bg-gray-700' : '' }}">--}}
{{--            <i class="fas fa-file-contract mr-2"></i> Leases--}}
{{--        </a>--}}
        <a href="#" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('payments.*') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-dollar-sign mr-2"></i> Payments
        </a>
{{--        <a href="{{ route('payments.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('payments.*') ? 'bg-gray-700' : '' }}">--}}
{{--            <i class="fas fa-dollar-sign mr-2"></i> Payments--}}
{{--        </a>--}}
    </nav>
</aside>
