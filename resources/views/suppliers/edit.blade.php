<x-app-layout>

    <x-slot name="header">
        <x-app.page-header
            title="Edit Supplier"
            description="Update Supplier details"
        />
    </x-slot>

    <x-app.card class="p-4 text-gray-200">

        @include('suppliers._partials.form')

    </x-app.card>

</x-app-layout>