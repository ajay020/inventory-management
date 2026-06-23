<aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 min-h-screen">

    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-indigo-600">
            Inventory
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Management System
        </p>
    </div>

    <nav class="mt-6">
       <div class="space-y-2">

            <x-app.sidebar-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                Dashboard
            </x-app.sidebar-link>

            <x-app.sidebar-link
                :href="route('categories.index')"
                :active="request()->routeIs('categories.*')"
            >
                Categories
            </x-app.sidebar-link>

        </div>
    </nav>

</aside>