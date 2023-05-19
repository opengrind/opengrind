<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Your user profile') }}</h2>
    <p>{{ __('Everyone in the company will be able to see these information.') }}</p>
  </div>

  <div class="md:mt-0 md:col-span-2">
    <form wire:submit.prevent="store">
      <!-- first name -->
      <div class="w-full max-w-lg mb-4">
        <x-input-label for="first_name" :value="__('First name')" />
        <x-text-input wire:model.defer="firstName" id="first_name" dusk="first-name-field" class="block mt-1 w-full" type="text" name="first_name" :value="old('firstName')" autofocus autocomplete="first_name" />
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
      </div>

      <!-- last name -->
      <div class="w-full max-w-lg mb-4">
        <x-input-label for="last_name" :value="__('Last name')" />
        <x-text-input wire:model.defer="lastName" id="last_name" dusk="last-name-field" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" autocomplete="last_name" />
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
      </div>

      <!-- email -->
      <div class="w-full max-w-lg mb-6">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input wire:model.defer="email" id="email" dusk="email-field" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
        <x-input-help>{{ __('We\'ll send you an email to confirm your new address if you change it.') }}</x-input-help>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="flex items-center justify-between mb-4">
        <x-button-form wire:loading.attr="disabled" dusk="submit-button">
          {{ __('Save') }}
        </x-button-form>
      </div>
    </form>
  </div>
</div>
