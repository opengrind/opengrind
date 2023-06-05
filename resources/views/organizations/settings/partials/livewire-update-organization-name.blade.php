<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Organization profile') }}</h2>
    <p class="text-sm">{{ __('This is the name of the organization.') }}</p>
  </div>

  <div class=" md:mt-0 md:col-span-2">
    <form wire:submit.prevent="store">
      <!-- organization name -->
      <div class="w-full max-w-lg mb-4">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input wire:model.defer="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
        <x-input-help>{{ trans('If you change the name of the organization, all the links pointing to this organization will be updated as well.') }}</x-input-help>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- organization description -->
      <div class="w-full max-w-lg mb-4">
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input wire:model.defer="description" id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" autofocus />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
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
