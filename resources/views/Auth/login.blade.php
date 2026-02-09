<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>

            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="mt-4 text-center">
    <span class="text-sm text-gray-600">
        Vous n’avez pas de compte ?
    </span>
    <a href="{{ route('register') }}"
       class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
        Inscrivez-vous
    </a>
</div>
    </form>
    <div class="mt-4 text-center">
    <a href="{{ route('login.google') }}"
       class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
            <path d="M21.35 11.1h-9.17v2.92h5.3c-.23 1.2-.93 2.21-1.98 2.88v2.39h3.2c1.87-1.72 2.95-4.25 2.95-7.19 0-.62-.06-1.22-.1-1.8z"/>
            <path d="M12.18 22c2.7 0 4.97-.9 6.63-2.43l-3.2-2.39c-.89.6-2.03.96-3.43.96-2.64 0-4.87-1.78-5.67-4.17H3.2v2.62C4.85 19.98 8.23 22 12.18 22z"/>
            <path d="M6.51 13.97c-.2-.6-.31-1.23-.31-1.88s.11-1.28.31-1.88V7.59H3.2C2.43 9.04 2 10.67 2 12.09c0 1.42.43 3.05 1.2 4.5l3.31-2.62z"/>
            <path d="M12.18 5.3c1.47 0 2.79.51 3.83 1.52l2.87-2.87C17.15 2.07 14.88 1 12.18 1 8.23 1 4.85 3.02 3.2 6.09l3.31 2.62c.8-2.39 3.03-4.17 5.67-4.17z"/>
        </svg>
        {{ __('Se connecter avec Google') }}
    </a>
</div>

</x-guest-layout>
