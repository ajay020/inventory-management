<x-app-layout>

    <x-slot name="header">
        <x-app.page-header
            title="Create Supplier"
            description="Add a new supplier to inventory."
        />
    </x-slot>

    <x-app.card class="p-6 text-gray-200">

        @include('suppliers._partials.form')

    </x-app.card>

</x-app-layout>