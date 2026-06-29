<x-app-layout>

    <x-slot name="header">
        <x-app.page-header
            title="Trashed Suppliers"
            description="Manage trashed suppliers."
        />
    </x-slot>

    <div class="flex items-center justify-between mb-6">

        <form
            action="{{ route('suppliers.trash') }}"
            method="GET"
            class="flex gap-2"
        >

            <x-text-input
                type="text"
                name="search"
                placeholder="Search by name"
                :value="request('search')"
            />

            <x-primary-button>
                Search
            </x-primary-button>

        </form>

        <a href="{{ route('suppliers.create') }}">
            <x-primary-button>
                New Supplier
            </x-primary-button>
        </a>

        {{-- <a
            href="{{ route('suppliers.trash') }}"
        >
            <x-secondary-button>
                Trash
            </x-secondary-button>
        </a> --}}

    </div>

    <div class="mb-4 text-sm text-gray-500">
        Total suppliers:
        <strong>{{ $suppliers->total() }}</strong>
    </div>

    <x-app.card class="p-0">

        <x-app.table>

            <x-app.table-head>

                <x-app.table-row>

                    <x-app.table-cell head>
                        Name
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Contact Person
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Email
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Phone
                    </x-app.table-cell>

                    <x-app.table-cell head>
                        Address
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

                @forelse($suppliers as $supplier)

                    <x-app.table-row>

                        <x-app.table-cell>
                            {{ $supplier->name }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            {{ $supplier->contact_person }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            {{ $supplier->email }}
                        </x-app.table-cell>

                        <x-app.table-cell>
                            {{ $supplier->phone }}
                        </x-app.table-cell>

                         <x-app.table-cell>
                            {{ $supplier->address }}
                        </x-app.table-cell>

                        <x-app.table-cell>

                            @if($supplier->is_active)

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

                            <x-app.restore-button 
                                 :action="route('suppliers.restore', $supplier->id)"
                            > 
                                Restore 
                            </x-app.restore-button>

                        </x-app.table-cell>

                    </x-app.table-row>

                @empty

                    <x-app.table-row>

                        <x-app.empty-state
                            :colspan="8"
                            message="No Supplier found."
                        />

                    </x-app.table-row>

                @endforelse

            </x-app.table-body>

        </x-app.table>

    </x-app.card>

    <div class="mt-6">
        {{ $suppliers->links() }}
    </div>

</x-app-layout>