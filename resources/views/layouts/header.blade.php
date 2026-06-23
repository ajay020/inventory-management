<header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

    <div class="flex justify-between items-center px-8 py-4">

        <h2 class="text-xl font-semibold">
            {{ $header ?? '' }}
        </h2>

        <div class="flex items-center gap-4">

            <span class="text-sm text-gray-600 dark:text-gray-300">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="text-red-600 hover:underline">
                    Logout
                </button>

            </form>

        </div>

    </div>

</header>