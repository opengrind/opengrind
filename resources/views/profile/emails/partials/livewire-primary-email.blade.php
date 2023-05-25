<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Primary email address') }}</h2>
    <p class="text-sm">{{ __('We use your primary email address to send you notifications about your account, such as password resets, and emails from projects you own.') }}</p>
  </div>

  <div class=" md:mt-0 md:col-span-2">
    <form wire:submit.prevent="store" class="flex items-center">
      <x-select placeholder="{{ __('Select an email address') }}"
        searchable="true"
        required="true"
        option-label="email"
        option-value="id"
        :options="$verifiedEmails"
        wire:model.defer="primaryEmailAddressId"
      />

      <!-- actions -->
      <div class="ml-3 flex items-center justify-between">
        <x-button-form wire:loading.attr="disabled">
          {{ __('Set') }}
        </x-button-form>
      </div>
    </form>
  </div>
</div>
