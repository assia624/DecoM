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
                <input id="remember_me" type="checkbox" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Buttons -->
        <div style="display: flex; justify-content: flex-end; align-items: center; gap: 10px; margin-top: 20px;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                   style="font-size: 14px; color: #4b5563; text-decoration: underline;">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Bouton Log in -->
            <button type="submit"
                style="
                    background-color: #1f2937;
                    color: white;
                    font-weight: 600;
                    padding: 8px 24px;
                    border: none;
                    border-radius: 9999px;
                    cursor: pointer;
                    transition: background-color 0.2s ease;
                "
                onmouseover="this.style.backgroundColor='#374151'"
                onmouseout="this.style.backgroundColor='#1f2937'">
                {{ __('Log in') }}
            </button>

            <!-- Bouton Register -->
            <button type="button"
                onclick="window.location='{{ route('register') }}'"
                style="
                    background-color: #374151;
                    color: white;
                    font-weight: 600;
                    padding: 8px 24px;
                    border: none;
                    border-radius: 9999px;
                    cursor: pointer;
                    transition: background-color 0.2s ease;
                "
                onmouseover="this.style.backgroundColor='#4b5563'"
                onmouseout="this.style.backgroundColor='#374151'">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
