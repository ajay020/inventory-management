@props([
    'head' => false,
])

@if ($head)
    <th {{ $attributes->merge([
        'class' => 'px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300'
    ]) }}>
        {{ $slot }}
    </th>
@else
    <td {{ $attributes->merge([
        'class' => 'px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200'
    ]) }}>
        {{ $slot }}
    </td>
@endif