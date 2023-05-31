<div class="md:grid md:grid-cols-3 md:gap-16">
  <div class="md:col-span-1">
    <h2 class="text-lg mb-2 font-bold">{{ __('Emails for your account') }}</h2>
    <p class="text-sm">{{ __('You can link multiple emails to your account, for example, one email per organization. You must have at least one primary email address. Emails need to be verified before they can be used.') }}</p>
  </div>

  <div class=" md:mt-0 md:col-span-2">
    <ul
      class="mb-6 rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
      @foreach ($emails as $email)
      <li
        class="item-list border-b border-gray-200 pl-5 pr-3 py-3 hover:bg-slate-50 dark:border-gray-700 dark:bg-slate-900 hover:dark:bg-slate-800 flex justify-between items-center">

        <!-- email + verified status -->
        <div class="flex items-center">
          <span class="mr-4 font-mono text-sm">{{ $email['email'] }}</span>

          <!-- verified status -->
          @if ($email['isVerified'])
          <span class="text-sm text-green-600 bg-green-50 px-2 py-1 rounded-lg dark:text-gray-400 flex items-center">
            <x-heroicon-o-check-badge class="mr-1 inline-block h-4 w-4 sm:h-4 sm:w-4" />

            <span>{{ __('verified') }}</span>
          </span>
          @else
          <span class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
            <x-heroicon-o-shield-exclamation class="mr-1 inline-block h-4 w-4 sm:h-4 sm:w-4" />

            <span>{{ __('not verified yet') }}</span>
          </span>
          @endif
        </div>

        <!-- actions -->
        @if ($email['canBeDeleted'])
        <x-dropdown>
          <x-dropdown.item wire:click="confirmDestroy({{ $email['id'] }})" label="{{ __('Delete') }}" />
        </x-dropdown>
        @endif
      </li>
      @endforeach
    </ul>

    <form wire:submit.prevent="store" class="flex relative">
      <div class="w-full max-w-lg mr-4">
        <x-input-label for="emailAddress" :value="__('Add new email address')" />
        <x-text-input wire:model.defer="emailAddress" id="emailAddress" class="block mt-1 w-full" type="email" name="emailAddress" :value="old('firstName')" autocomplete="emailAddress" />
        <x-input-help>{{ trans('We\'ll send a confirmation link to the email address you provided to verify ownership.') }}</x-input-help>
        <x-input-error :messages="$errors->get('emailAddress')" class="mt-2" />
      </div>

      <!-- actions -->
      <div class="btn-add relative">
        <x-button-form wire:loading.attr="disabled">
          {{ __('Add') }}
        </x-button-form>
      </div>
    </form>
  </div>
</div>

<style>
  .btn-add {
    top: 26px;
  }
</style>
