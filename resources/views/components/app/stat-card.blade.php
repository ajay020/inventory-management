@props([
    'title',
    'value',
])

<div class="bg-white rounded-lg shadow p-6">

    <p class="text-sm text-gray-500">
        {{ $title }}
    </p>

    <h2 class="mt-2 text-3xl font-bold">
        {{ $value }}
    </h2>

</div>