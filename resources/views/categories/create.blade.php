<x-app-layout>

    <x-slot name="header">
        <x-app.page-header
            title="Create Category"
            description="Add a new category to organize your inventory."
        />
    </x-slot>

    <x-app.card class="p-4">

        @include('categories._partials.form')

    </x-app.card>

</x-app-layout>

