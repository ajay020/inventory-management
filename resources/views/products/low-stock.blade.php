<x-app-layout>

    <x-slot name="header">
        <x-app.page-header
            title="Low Stock Products"
            description="Products that need to be restocked."
        />
    </x-slot>

    <div class="flex items-center justify-between mb-6">

        <form
            action="{{ route('products.index') }}"
            method="GET"
            class="flex gap-2"
        >

            <x-text-input
                type="text"
                name="search"
                placeholder="Search by name or SKU..."
                :value="request('search')"
            />

            <x-primary-button>
                Search
            </x-primary-button>

        </form>

        <a href="{{ route('products.create') }}">
            <x-primary-button>
                New Product
            </x-primary-button>
        </a>

        <a
            href="{{ route('products.trash') }}"
        >
            <x-secondary-button>
                Trash
            </x-secondary-button>
        </a>

    </div>

    <div class="mb-4 text-sm text-gray-500">
        Total Products:
        <strong>{{ $products->total() }}</strong>
    </div>

    <x-app.card class="p-0">

        <x-app.table>

            <x-app.table-head>

                <x-app.table-row>

                    <x-app.table-cell head>
                        SKU
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Product
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Category
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Cost
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Price
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Stock
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Status
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Actions
                    </x-app.table-cell>

                </x-app.table-row>

            </x-app.table-head>

            <x-app.table-body>

                @forelse($products as $product)

                    <x-app.table-row>

                        <x-app.table-cell>
                            {{ $product->sku }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            {{ $product->name }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            {{ $product->category->name }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            ₹{{ number_format($product->cost_price, 2) }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            ₹{{ number_format($product->selling_price, 2) }}
                        </x-app.table-cell>

                        <x-app.table-cell>

                            @if($product->isLowStock())

                                <span class="font-semibold text-red-600">
                                    {{ $product->stock_quantity }}
                                </span>

                            @else

                                {{ $product->stock_quantity }}

                            @endif

                        </x-app.table-cell>

                        <x-app.table-cell>

                            @if($product->is_active)

                                <span class="text-green-600">
                                    Active
                                </span>

                            @else

                                <span class="text-gray-500">
                                    Inactive
                                </span>

                            @endif

                        </x-app.table-cell>

                        <x-app.table-cell>

                            <div class="flex items-center gap-3">

                                <x-app.link
                                    :href="route('products.edit', $product)"
                                >
                                    Edit
                                </x-app.link>

                               <x-app.delete-button
                                   :action="route('products.destroy', $product)"
                                    message="Move product to trash?"
                                />

                            </div>

                        </x-app.table-cell>

                    </x-app.table-row>

                @empty

                    <x-app.table-row>

                        <x-app.empty-state
                            :colspan="8"
                            message="No products found."
                        />

                    </x-app.table-row>

                @endforelse

            </x-app.table-body>

        </x-app.table>

    </x-app.card>

    <div class="mt-6">
        {{ $products->links() }}
    </div>

</x-app-layout>