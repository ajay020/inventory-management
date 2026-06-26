
@props([
    'action',
    'message' => 'Are you sure?',
])

<form
    action="{{ $action }}"
    method="POST"
    class="inline"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        onclick="return confirm('{{ $message }}')"
        class="text-red-600 hover:text-red-900"
    >
        {{-- {{ $slot ?: 'Delete' }}  --}}
        Delete
    </button>

</form>