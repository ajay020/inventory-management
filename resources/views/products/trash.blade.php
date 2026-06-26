<x-app-layout>

    <div class="flex items-center justify-between mb-6">
            <div>
                <h2  class="text-2xl font-bold text-gray-900 dark:text-white">
                    Trashed Products
                </h2>

                <p class="text-gray-500">
                    Restore deleted products.
                </p>
            </div>

            <a
                href="{{ route('products.create') }}"
            >
                <x-primary-button>
                    New Product
                </x-primary-button>
            </a>
    </div>

  <div class="flex items-center justify-between mb-6">

        <form
            action="{{ route('products.index') }}"
            method="GET"
            class="flex gap-2"
        >
            <x-text-input
                type="text"
                name="search"
                placeholder="Search products..."
                :value="request('search')"
            />

            <x-primary-button>
                Search
            </x-primary-button>

        </form>

        <div class="text-sm text-gray-500">
            Total:
            <strong>{{ $products->total() }}</strong>
        </div>

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

                            <x-app.restore-button  :action="route('products.restore', $product->id)" > 
                                Restore 
                            </x-app.restore-button>

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