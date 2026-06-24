@props(['disabled' => false])

<input
 @disabled($disabled)
  {{ $attributes->merge(['class' => 'text-gray-900 dark:text-white border-gray-300 bg-gray-300 dark:bg-gray-900 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
