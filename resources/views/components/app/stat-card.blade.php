@props([
    'title',
    'value',
    'href' => null,
])

@if($href)
    <a href="{{ $href }}" class="block">
@endif

<div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition">
    <p class="text-sm text-gray-500">
        {{ $title }}
    </p>

    <h2 class="mt-2 text-3xl font-bold">
        {{ $value }}
    </h2>
</div>

@if($href)
    </a>
@endif