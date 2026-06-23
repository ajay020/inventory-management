<x-app-layout>

      <x-app.page-header
        title="Categories"
        description="Manage product categories"
    >
        <x-primary-button>
            Add Category
        </x-primary-button>
    </x-app.page-header>

    <x-app.card class="p-0">

        <x-app.table>

            <x-app.table-head>

                <x-app.table-row>

                    <x-app.table-cell head>Name</x-app.table-cell>

                    <x-app.table-cell head>Description</x-app.table-cell>

                    <x-app.table-cell head>Created</x-app.table-cell>

                    <x-app.table-cell head>Actions</x-app.table-cell>

                </x-app.table-row>

            </x-app.table-head>

            <x-app.table-body>

                @forelse($categories as $category)

                    <x-app.table-row>

                        <x-app.table-cell>
                            {{ $category->name }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            {{ $category->description }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            {{ $category->created_at->format('d M Y') }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            Edit | Delete
                        </x-app.table-cell>

                    </x-app.table-row>

                @empty

                    <x-app.table-row>

                        <x-app.empty-state
                            :colspan="4"
                            message="No categories found."
                        />

                    </x-app.table-row>

                @endforelse

            </x-app.table-body>

        </x-app.table>

    </x-app.card>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>

</x-app-layout>