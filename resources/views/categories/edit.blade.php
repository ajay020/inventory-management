<x-app-layout>

    <x-slot name="header">
        <x-app.page-header
            title="Edit Category"
            description="Update category information."
        />
    </x-slot>

    <x-app.card>

        @include('categories._partials.form')

    </x-app.card>

</x-app-layout>