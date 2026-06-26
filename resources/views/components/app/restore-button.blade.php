
@props([
    'action',
])

<form
    action="{{ $action }}"
    method="POST"
    class="inline"
>
    @csrf
    @method('PATCH')

    <button
        type="submit"
        class="text-green-600 hover:text-green-900"
    >
       Restore
    </button>

</form>