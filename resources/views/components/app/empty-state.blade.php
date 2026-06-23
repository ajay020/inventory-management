 @props([
        'message' => 'No items found.'
    ])
 
 
 <td {{ $attributes->merge([
        'class' => 'text-center py-10 text-gray-500',
        'colspan' => 100
 ]) }} >
    {{ $message }}
</td>