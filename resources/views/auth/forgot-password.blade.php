<x-guest-layout>
  <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
  </div>

  <!-- Session Status -->
  <x-auth-session-status class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 border rounded-lg p-5 border-green-200 bg-emerald-50" :status="session('status')" />

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex justify-between items-center mt-4">
      <x-link :route="route('login.create')">{{ __('Go back') }}</x-link>

      <x-button-form class="ml-4">
        {{ __('Email password reset link') }}
      </x-button-form>
    </div>
  </form>
</x-guest-layout>
