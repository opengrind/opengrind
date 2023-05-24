<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Timezone') }}</h2>
    <p class="text-sm">{{ __('This setting enables us to display dates and times according to your time zone.') }}</p>
  </div>

  <div class=" md:mt-0 md:col-span-2">
    <form wire:submit.prevent="store">
      <div class="w-full max-w-lg mb-4">
        <x-select label="{{ __('Timezone') }}" placeholder="{{ __('Select a timezone')}}" searchable="true" required="true" option-label="name" option-value="id" :options="$timezones" wire:model.defer="timezone" />
      </div>

      <!-- what the current time is -->
      <div class="mb-4">
        <p class="text-sm text-gray-500">
          {{ __('Current time in this timezone:') }} <span class="font-bold font-mono">{{ $currentTime }}</span>
        </p>
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
