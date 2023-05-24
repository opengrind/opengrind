<x-guest-layout>
  <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

  <h2 class="font-bold text-center mb-2">{{ trans('Welcome to OpenGrind') }}</h2>
  <h3 class="text-sm text-gray-700 mb-4 text-center">{{ trans('Create your account now for free.') }}</h3>

  <form method="POST" action="{{ route('register.store') }}">
    @csrf

    <!-- Username -->
    <div class="mb-4">
      <x-input-label for="username" :value="trans('Username')" />
      <x-text-input id="username" dusk="username-field" autofocus class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
      <x-input-help>{{ trans('No blank space and no special characters. It will be used to identify you on OpenGrind.') }}</x-input-help>
      <x-input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mb-4">
      <x-input-label for="email" :value="trans('Email')" />
      <x-text-input id="email" dusk="email-field" autofocus class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
      <x-input-help>{{ trans('We will send you a verification email, and won\'t spam you.') }}</x-input-help>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-4">
      <x-input-label for="password" :value="trans('Password')" />
      <x-text-input id="password" dusk="password-field" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
      <x-input-help>{{ trans('Minimum 6 characters, up to 60.') }}</x-input-help>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-8">
      <x-input-label for="password_confirmation" :value="trans('Confirm password')" />
      <x-text-input id="password_confirmation" dusk="password-confirmation-field" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-between">
      <x-link :route="route('login.create')">{{ trans('Already registered?') }}</x-link>

      <x-button-form class="ml-4" dusk="submit-button">
        {{ trans('Register') }}
      </x-button-form>
    </div>
  </form>
</x-guest-layout>
