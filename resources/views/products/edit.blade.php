<x-app-layout>

    <x-slot name="header">
        <x-app.page-header
            title="Edit Product"
            description="Update product details"
        />
    </x-slot>

    <x-app.card class="p-4 text-gray-200">

        @include('products._partials.form')

    </x-app.card>

</x-app-layout>