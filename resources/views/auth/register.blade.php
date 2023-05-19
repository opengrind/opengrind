<x-guest-layout>
  <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

  <h2 class="font-bold text-center mb-2">{{ __('Welcome to OpenGrind') }}</h2>
  <h3 class="text-sm text-gray-700 mb-4 text-center">{{ __('Create your account now for free.') }}</h3>

  <form method="POST" action="{{ route('register.store') }}">
    @csrf

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" dusk="email-field" autofocus class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
      <x-input-help>{{ __('We will send you a verification email, and won\'t spam you.') }}</x-input-help>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" dusk="password-field" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
      <x-input-help>{{ __('Minimum 6 characters, up to 60.') }}</x-input-help>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirm password')" />
      <x-text-input id="password_confirmation" dusk="password-confirmation-field" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-between mt-4">
      <x-link :route="route('login.create')">{{ __('Already registered?') }}</x-link>

      <x-button-form class="ml-4" dusk="submit-button">
        {{ __('Register') }}
      </x-button-form>
    </div>
  </form>
</x-guest-layout>
