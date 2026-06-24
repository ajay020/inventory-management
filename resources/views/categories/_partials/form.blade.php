<form
    action="{{ isset($category)
        ? route('categories.update', $category)
        : route('categories.store') }}"
    method="POST"
    class="space-y-6"
>
    @csrf

    @isset($category)
        @method('PUT')
    @endisset

    <x-app.form-group>

        <x-input-label
            for="name"
            value="Category Name"
        />

        <x-text-input
            id="name"
            name="name"
            type="text"
            class="block w-full"
            :value="old('name', $category->name ?? '')"
            autofocus
        />

        <x-input-error
            :messages="$errors->get('name')"
        />

    </x-app.form-group>

    <x-app.form-group>

        <x-input-label
            for="description"
            value="Description"
        />

        <textarea
            id="description"
            name="description"
            rows="4"
            class="block w-full text-white dark:text-gray-900 bg-gray-300 dark:bg-gray-900 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >
            {{ old('description', $category->description ?? '') }}
        </textarea>

        <x-input-error
            :messages="$errors->get('description')"
        />

    </x-app.form-group>

    <div class="flex justify-end">

        <x-primary-button>
         {{ isset($category) ? 'Update Category' : 'Create Category' }}
        </x-primary-button>

    </div>

</form>