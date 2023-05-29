<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Profile picture') }}</h2>
    <p class="text-sm">{{ __('You can choose to display an avatar either by using the default one based on your nickname or by uploading a photo.') }}</p>
  </div>

  <div class=" md:mt-0 md:col-span-2">
    <!-- current avatar -->
    <div class="flex mb-4">
      <div src="" class="h-20 w-20 rounded-full ring-2 ring-white dark:ring-gray-900">
        {!! $avatar['content'] !!}
      </div>
    </div>

    <!-- actions -->
    <div class="flex items-center justify-between">
      <form wire:submit.prevent="generateNewAvatar">
        <x-button-form wire:loading.attr="disabled" dusk="submit-button">
          {{ __('Generate a new avatar') }}
        </x-button-form>
      </form>
    </div>
  </div>
</div>
