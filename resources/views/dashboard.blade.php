<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

        <x-app.stat-card
            title="Total Products"
            :value="$totalProducts"
        />

        <x-app.stat-card
            title="Active Products"
            :value="$activeProducts"
        />

        <x-app.stat-card
            title="Low Stock"
            :value="$lowStockProducts"
            :href="route('products.low-stock')"
        />

        <x-app.stat-card
            title="Out of Stock"
            :value="$outOfStockProducts"
        />

        <x-app.stat-card
            title="Inventory Value"
            :value="'₹' . number_format($inventoryValue ?? 0, 2)"
        />

    </div>
</x-app-layout>
