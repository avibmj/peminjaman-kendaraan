<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add Super Admin Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Create a new super admin account to have full access and control.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('superadmin.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->storeSuperAdmin->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->storeSuperAdmin->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->storeSuperAdmin->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->storeSuperAdmin->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="form-select block w-full mt-1">
                <option value="" disabled selected>Pilih Jenis</option>
                <option value="super-admin">Super Admin</option>
                <option value="user-admin">User Admin</option>
            </select>
            <x-input-error :messages="$errors->storeSuperAdmin->get('role')" class="mt-2" />
        </div>

        <div class="mt-6 flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('success'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500"
                >{{ session('success') }}</p>
            @endif
        </div>

    </form>
</section>

<style>
    .form-select {
        padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.375rem;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d2d6dc;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-select:focus {
        border-color: #a3bffa;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(164, 179, 250, 0.25);
    }

    .form-select.is-invalid {
        border-color: #e3342f;
    }

    .form-select.is-invalid:focus {
        border-color: #cc1f1a;
        box-shadow: 0 0 0 0.2rem rgba(227, 52, 47, 0.25);
    }
</style>

