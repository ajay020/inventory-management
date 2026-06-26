<form
    action="{{ $product->exists
        ? route('products.update', $product)
        : route('products.store') }}"
    method="POST"
    class="space-y-6"
>
    @csrf

    @if($product->exists)
        @method('PUT')
    @endif


    {{-- category  --}}
    <x-app.form-group>

        <x-input-label
            for="category_id"
            value="Category"
        />

        <x-select
            id="category_id"
            name="category_id"
            class="block w-full"
        >

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(
                        old('category_id', $product->category_id)
                        == $category->id
                    )
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </x-select>

        <x-input-error
            :messages="$errors->get('category_id')"
        />

    </x-app.form-group>

    {{-- Name  --}}
    <x-app.form-group>

        <x-input-label
            for="name"
            value="Product Name"
        />

        <x-text-input
            id="name"
            name="name"
            type="text"
            class="block w-full"
            :value="old('name', $product->name)"
        />

        <x-input-error
            :messages="$errors->get('name')"
        />

    </x-app.form-group>

    {{--  sku --}}
    <x-app.form-group>

        <x-input-label
            for="sku"
            value="SKU"
        />

        <x-text-input
            id="sku"
            name="sku"
            type="text"
            class="block w-full"
            :value="old('sku', $product->sku)"
        />

        <x-input-error
            :messages="$errors->get('sku')"
        />

    </x-app.form-group>

    {{-- Description  --}}
    <x-app.form-group>

        <x-input-label
            for="description"
            value="Description"
        />

        <textarea
            id="description"
            name="description"
            rows="4"
            class="block bg-gray-900 w-full rounded-md border-gray-300 shadow-sm"
        >{{ old('description', $product->description) }}</textarea>

        <x-input-error
            :messages="$errors->get('description')"
        />

    </x-app.form-group>

    {{-- Prices  --}}
    <div class="grid grid-cols-2 gap-4">
        {{-- Cost price  --}}
        <x-app.form-group>

            <x-input-label
                for="cost_price"
                value="Cost Price"
            />

            <x-text-input
                id="cost_price"
                name="cost_price"
                type="number"
                step="0.01"
                class="block w-full"
                :value="old('cost_price', $product->cost_price)"
            />

            <x-input-error
                :messages="$errors->get('cost_price')"
            />

        </x-app.form-group>

        {{-- Selling price  --}}
        <x-app.form-group>

            <x-input-label
                for="selling_price"
                value="Selling Price"
            />

            <x-text-input
                id="selling_price"
                name="selling_price"
                type="number"
                step="0.01"
                class="block w-full"
                :value="old('selling_price', $product->selling_price)"
            />

            <x-input-error
                :messages="$errors->get('selling_price')"
            />

        </x-app.form-group>

    </div>

    {{-- Stoc section  --}}
    <div class="grid grid-cols-2 gap-4">
        {{-- quantity --}}
        <x-app.form-group>

            <x-input-label
                for="stock_quantity"
                value="Stock Quantity"
            />

            <x-text-input
                id="stock_quantity"
                name="stock_quantity"
                type="number"
                class="block w-full"
                :value="old('stock_quantity', $product->stock_quantity ?? 0)"
            />

        </x-app.form-group>

        {{-- minimum stock  --}}
        <x-app.form-group>

            <x-input-label
                for="minimum_stock_level"
                value="Minimum Stock Level"
            />

            <x-text-input
                id="minimum_stock_level"
                name="minimum_stock_level"
                type="number"
                class="block w-full"
                :value="old(
                    'minimum_stock_level',
                    $product->minimum_stock_level ?? 5
                )"
            />
        </x-app.form-group>

    </div>

    {{-- status  --}}

    <x-app.form-group>

        <label class="flex items-center gap-2">

            <input
                type="hidden"
                name="is_active"
                value="0"
            >

            <input
                type="checkbox"
                name="is_active"
                value="1"
                @checked(old('is_active', $product->is_active))
            >

            <span>
                Active Product
            </span>

        </label>

    </x-app.form-group>

    {{-- Submit button  --}}
    <div class="flex justify-end">

        <x-primary-button>

            {{ $product->exists
                ? 'Update Product'
                : 'Create Product' }}

        </x-primary-button>

    </div>

</form>