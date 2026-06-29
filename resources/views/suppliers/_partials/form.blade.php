<form
    action="{{ $supplier->exists
        ? route('suppliers.update', $supplier)
        : route('suppliers.store') }}"
    method="POST"
    class="space-y-6"
>
    @csrf

    @if($supplier->exists)
        @method('PUT')
    @endif


    {{-- Name  --}}
    <x-app.form-group>

        <x-input-label
            for="name"
            value="Supplier Name"
        />

        <x-text-input
            id="name"
            name="name"
            type="text"
            class="block w-full"
            :value="old('name', $supplier->name)"
        />

        <x-input-error
            :messages="$errors->get('name')"
        />

    </x-app.form-group>

    {{--  Contact Person --}}
    <x-app.form-group>

        <x-input-label
            for="contact_person"
            value="Contact Person"
        />

        <x-text-input
            id="contact_person"
            name="contact_person"
            type="text"
            class="block w-full"
            :value="old('contact_person', $supplier->contact_person)"
        />

        <x-input-error
            :messages="$errors->get('contact_person')"
        />

    </x-app.form-group>

    {{-- Email  --}}
    <x-app.form-group>

        <x-input-label
            for="email"
            value="Email"
        />

        <x-text-input
            id="email"
            name="email"
            type="text"
            class="block w-full"
            :value="old('email', $supplier->email)"
        />

        <x-input-error
            :messages="$errors->get('email')"
        />

    </x-app.form-group>

    {{-- Phone  --}}
    <x-app.form-group>

        <x-input-label
            for="phone"
            value="Phone"
        />

        <x-text-input
            id="phone"
            name="phone"
            type="text"
            class="block w-full"
            :value="old('phone', $supplier->phone)"
        />

        <x-input-error
            :messages="$errors->get('phone')"
        />

    </x-app.form-group>

      {{-- Address  --}}
    <x-app.form-group>

        <x-input-label
            for="address"
            value="Address"
        />

        <x-text-input
            id="address"
            name="address"
            type="text"
            class="block w-full"
            :value="old('address', $supplier->address)"
        />

        <x-input-error
            :messages="$errors->get('address')"
        />

    </x-app.form-group>


    {{-- status  --}}
    <x-app.form-group>

        <label class="flex items-center gap-2">

            <input
                type="hidden"
                name="is_active"
                value="0"
            >

            <input
                type="checkbox"
                name="is_active"
                value="1"
                @checked(old('is_active', $supplier->is_active))
            >

            <span>
                Active Product
            </span>

        </label>

    </x-app.form-group>


    {{-- Submit button  --}}
    <div class="flex justify-end">

        <x-primary-button>

            {{ $supplier->exists
                ? 'Update Supplier'
                : 'Create Supplier' }}

        </x-primary-button>

    </div>

</form>

