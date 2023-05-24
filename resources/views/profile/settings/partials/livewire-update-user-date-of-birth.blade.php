<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Date of birth') }}</h2>
    <p class="text-sm">{{ __('On your profile, you can indicate your age. You have the power to choose how to show this information to others.') }}</p>
  </div>

  <div class="md:mt-0 md:col-span-2">
    <form wire:submit.prevent="store">
      <div class="max-w-xs mb-4">
        <x-datetime-picker label="{{ __('Date of birth') }}" placeholder="{{ __('Pick a date')}}" required="true" display-format="DD-MM-YYYY" without-time="true" without-timezone="true" wire:model.defer="bornAt" />
      </div>

      <!-- age option -->
      <div class="space-y-2 mb-4">
        <div class="flex items-center gap-x-2">
          <input id="hidden" wire:model.defer="agePreferences" value="hidden" name="date-birth" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
          <label for="hidden" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Never display the date of birth to anyone') }}</label>
        </div>
        <div class="flex items-center gap-x-2">
          <input id="month_day" wire:model.defer="agePreferences" value="month_day" name="date-birth" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
          <label for="month_day" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Only show the day and the month') }}</label>
        </div>
        <div class="flex items-center gap-x-2">
          <input id="full" wire:model.defer="agePreferences" value="full" name="date-birth" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
          <label for="full" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Display the full date of birth') }}</label>
        </div>
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
