<x-app-layout>

    <div class="flex items-center justify-between mb-6">
            <div>
                <h2  class="text-2xl font-bold text-gray-900 dark:text-white">
                    Categories
                </h2>

                <p class="text-gray-500">
                    Manage inventory categories.
                </p>
            </div>

            <a
                href="{{ route('categories.create') }}"
            >
                <x-primary-button>
                    New Category
                </x-primary-button>
            </a>

            <a
                href="{{ route('categories.trash') }}"
            >
                <x-secondary-button>
                    Trash
                </x-secondary-button>
            </a>
    </div>

  <div class="flex items-center justify-between mb-6">

        <form
            action="{{ route('categories.index') }}"
            method="GET"
            class="flex gap-2"
        >

            <x-text-input
                type="text"
                name="search"
                placeholder="Search categories..."
                :value="request('search')"
            />

            <x-primary-button>
                Search
            </x-primary-button>

        </form>

        <div class="text-sm text-gray-500">
            Total:
            <strong>{{ $categories->total() }}</strong>
        </div>

    </div>

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

                        <td class="space-x-2">

                            <a
                                href="{{ route('categories.edit', $category) }}"
                                class="text-indigo-600 hover:text-indigo-900"
                            >
                                Edit
                            </a>

                             <x-app.delete-button
                                   :action="route('categories.destroy', $category)"
                                    message="Move category to trash?"
                            />

                        </td>

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