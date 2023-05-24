<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Profile visibility') }}</h2>
    <p class="text-sm">{{ __('Your profile can be either public or hidden. If hidden, no one will find it, except for members of an organization you belong to who will be able to view it until you leave the organization.') }}</p>
  </div>

  <div class=" md:mt-0 md:col-span-2">
    <form wire:submit.prevent="store">
      <!-- options -->
      <div class="space-y-2 mb-4">
        <div class="flex items-center gap-x-2">
          <input id="hide" wire:model.defer="hasPublicProfile" value="0" name="visibility" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
          <label for="hide" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Hide public profile') }}</label>
        </div>
        <div class="flex items-center gap-x-2">
          <input id="show" wire:model.defer="hasPublicProfile" value="1" name="visibility" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
          <label for="show" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Show this profile to the public') }}</label>
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
