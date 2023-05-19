<x-guest-layout>
  <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

  <h2 class="font-bold text-center mb-2">{{ __('Welcome back to OpenGrind') }}</h2>
  <p class="mb-4 text-center">
    <x-link :route="route('register')">{{ __('Don\'t have an account?') }}</x-link>
  </p>

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login.store') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" dusk="email-field" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" dusk="password-field" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-between mt-4">
      @if (Route::has('password.request'))
      <x-link :route="route('password.request')">{{ __('Forgot your password?') }}</x-link>
      @endif

      <x-button-form class="ml-3" dusk="submit-button">
        {{ __('Log in') }}
      </x-button-form>
    </div>
  </form>
</x-guest-layout>
