@props([
    'type' => 'success',
])

@php
$styles = [
    'success' => 'bg-green-100 text-green-800 border-green-300',
    'error' => 'bg-red-100 text-red-800 border-red-300',
    'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
    'info' => 'bg-blue-100 text-blue-800 border-blue-300',
];
@endphp

<div
    {{ $attributes->merge([
        'class' => 'mb-6 rounded-lg border px-4 py-3 '.$styles[$type],
    ]) }}
>
    {{ $slot }}
</div>