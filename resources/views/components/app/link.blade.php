
@props([
    'href',
    'variant' => 'primary',
])

@php
$classes = match ($variant) {
    'danger' => 'text-red-600 hover:text-red-900',
    default => 'text-indigo-600 hover:text-indigo-900',
};
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => $classes
    ]) }}
>
    {{ $slot }}
</a>