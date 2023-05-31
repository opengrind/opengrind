<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('User profile') }}</h2>
    <p class="text-sm">{{ __('Only your nickname will be visible to everyone. Your name will stay private unless you make it public within an organization – in that case, it will be visible within that organization.') }}</p>
  </div>

  <div class=" md:mt-0 md:col-span-2">
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

      <!-- username -->
      <div class="w-full max-w-lg mb-4">
        <x-input-label for="username" :value="__('Username')" />
        <x-text-input wire:model.defer="username" id="username" dusk="last-name-field" class="block mt-1 w-full" type="text" name="username" :value="old('username')" autocomplete="username" />
        <x-input-help>{{ trans('No spaces, punctuation, or special characters allowed. This will be used to identify you on OpenGrind.') }}</x-input-help>
        <x-input-error :messages="$errors->get('username')" class="mt-2" />
      </div>

      <!-- actions -->
      <div class="flex items-center justify-between">
        <x-button-form wire:loading.attr="disabled" dusk="submit-button">
          {{ __('Save') }}
        </x-button-form>
      </div>
    </form>
  </div>
</div>
