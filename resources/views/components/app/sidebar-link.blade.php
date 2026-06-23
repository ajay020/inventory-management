@props([
    'href',
    'active' => false,
])

<a
    href="{{ $href }}"
    {{ $attributes->class([
        'flex items-center gap-3 rounded-lg px-4 py-2 text-sm font-medium transition-colors',
        'bg-indigo-600 text-white' => $active,
        'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' => ! $active,
    ]) }}
>
    {{ $slot }}
</a>