<div class="">
  @if (! $openModal)
  <div class="flex justify-end mb-3">
    <x-button-form wire:click="toggle" dusk="open-modal-button" secondary>
      {{ __('Add') }}
    </x-button-form>
  </div>
  @endif

  @if ($openModal)
  <form wire:submit.prevent="store" class="bg-form mb-6 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="border-b border-gray-200 dark:border-gray-700 p-5">
      <!-- name -->
      <div class="w-full max-w-lg">
        <x-input-label for="name" :value="__('Office name')" />
        <x-text-input wire:model.defer="name" wire:keydown.escape="toggle()" id="name" dusk="name-field" class="block mt-1 w-full name" type="text" name="name" :value="old('name')" autofocus required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
    </div>

    <!-- permissions -->
    <div class="border-b border-gray-200 dark:border-gray-700 p-5">
      <p class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">{{ __('Main office') }}</p>

      <x-toggle label="{{ __('Indicate that this office is the main office') }}"
        wire:model.defer="isMainOffice"
        class="text-base"
        id="toggle-main-office" />
    </div>

    <!-- actions -->
    <div class="flex justify-between p-5">
      <x-button-form secondary wire:click="toggle">{{ __('Cancel') }}</x-button-form>

      <x-button-form wire:loading.attr="disabled" dusk="submit-button">
        {{ __('Save') }}
      </x-button-form>
    </div>
  </form>
  @endif

  <!-- list of offices -->
  @if ($offices->count() > 0)
  <ul dusk="office-list" class="list mb-2 rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
    @foreach ($offices as $office)
    <li :wire:key="$office['id']" class="item-list border-b border-gray-200 hover:bg-slate-50 dark:border-gray-700 dark:bg-slate-900 hover:dark:bg-slate-800">
      @if ($office['id'] !== $editedOfficeId)
      <div class="p-3 flex justify-between items-center">
        <p class="font-semibold">
          {{ $office['name'] }}

          @if ($office['is_main_office'])
          <span class="ml-2 bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hidden md:inline">{{ __('Main office') }}</span>
          @endif
        </p>

        <x-dropdown>
          <x-dropdown.item wire:click="toggleEdit({{ $office['id'] }})" label="{{ __('Edit') }}" />
          <x-dropdown.item dusk="destroy-button-{{ $office['id'] }}" wire:click="confirmDestroy({{ $office['id'] }})" label="{{ __('Delete') }}" />
        </x-dropdown>
      </div>
      @endif

      <!-- edit office modal -->
      @if ($editedOfficeId === $office['id'])
      <form wire:submit.prevent="update({{ $office['id'] }})" class="">
        <div class="border-b border-gray-200 dark:border-gray-700 p-5">
          <!-- name -->
          <div class="w-full max-w-lg">
            <x-input-label for="name" :value="__('Label')" />
            <x-text-input wire:model.defer="name" id="name" wire:keydown.escape="toggleEdit(0)" dusk="name-field" class="block mt-1 w-full name" type="text" name="name" :value="old('name')" autofocus required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
        </div>

        <!-- permissions -->
        <div class="border-b border-gray-200 dark:border-gray-700 p-5">
          <p class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">{{ __('Main office') }}</p>

          <x-toggle label="{{ __('Indicate that this office is the main office') }}"
            :checked="$isMainOffice == true"
            wire:model.defer="isMainOffice"
            class="text-base"
            id="toggle-main-office" />
        </div>

        <!-- actions -->
        <div class="flex justify-between p-5">
          <x-button-form secondary wire:click="toggleEdit(0)">{{ __('Cancel') }}</x-button-form>

          <x-button-form wire:loading.attr="disabled" dusk="submit-button">
            {{ __('Save') }}
          </x-button-form>
        </div>
      </form>
      @endif
    </li>
    @endforeach
  </ul>
  @endif

  <!-- blank state -->
  @if ($offices->count() === 0)
  <div class="mb-6 rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900 flex items-center justify-center">
    <img src="/img/settings_blank_offices.svg" class="h-32 w-32 p-5" />
  </div>
  @endif
</div>

@push('scripts')
<script>
  Livewire.on('focusNameField', () => {
    document.querySelector('.name').focus();
  });
</script>
@endpush
