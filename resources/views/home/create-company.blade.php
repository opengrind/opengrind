<x-guest-layout>
  <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

  <h2 class="font-bold text-center mb-2 text-gray-600 dark:text-gray-400">{{ __('Let\'s setup your company\'s account') }}</h2>
  <p class="text-center mb-6 text-gray-600">{{ __('It will host all your company\'s data.') }}</p>

  <!-- Session Status -->
  <x-auth-session-status class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 border rounded-lg p-5 border-green-200 bg-emerald-50" :status="session('status')" />

  <form method="POST" action="{{ route('create_company.store') }}">
    @csrf

    <!-- Company name -->
    <div>
      <x-input-label for="name" :value="__('Name of the company')" />
      <x-text-input id="name" dusk="company-name-field" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="flex items-center justify-between mt-4">
      <x-link :route="route('welcome.index')">{{ __('Go back') }}</x-link>

      <x-button-form class="ml-3" dusk="submit-button">
        {{ __('Create') }}
      </x-button-form>
    </div>
  </form>
</x-guest-layout>
