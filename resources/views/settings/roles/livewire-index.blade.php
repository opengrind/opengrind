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
      <!-- role name -->
      <div class="w-full max-w-lg">
        <x-input-label for="label" :value="__('Label')" />
        <x-text-input wire:model.defer="label" wire:keydown.escape="toggle()" id="label" dusk="name-field" class="block mt-1 w-full name" type="text" name="label" :value="old('label')" autofocus required />
        <x-input-error :messages="$errors->get('label')" class="mt-2" />
      </div>
    </div>

    <!-- permissions -->
    <div class="border-b border-gray-200 dark:border-gray-700 p-5">
      <p class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">{{ __('Permissions') }}</p>

      <div class="grid grid-cols-3 gap-1">
        @foreach ($allPossiblePermissions as $index => $permission)
        <x-toggle label="{{ $permission['label'] }}"
          wire:model.defer="allPossiblePermissions.{{ $index }}.active"
          :checked="$permission['active'] == 1"
          :wire:key="$permission['id']"
          class="text-base"
          dusk="toggle-{{ $permission['id'] }}"
          id="toggle-{{ $permission['id'] }}" />
        @endforeach
      </div>
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

  <!-- list of roles -->
  <ul dusk="role-list" class="list mb-2 rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
    @foreach ($roles as $role)
    <li :wire:key="$role['id']" class="item-list border-b border-gray-200 hover:bg-slate-50 dark:border-gray-700 dark:bg-slate-900 hover:dark:bg-slate-800">
      @if ($role['id'] !== $editedRoleId)
      <div class="p-3 flex justify-between items-center">
        <p class="font-semibold">{{ $role['label'] }}</p>

        <x-dropdown>
          <x-dropdown.item wire:click="toggleEdit({{ $role['id'] }})" label="{{ __('Edit') }}" />
          <x-dropdown.item dusk="destroy-button-{{ $role['id'] }}" wire:click="confirmDestroy({{ $role['id'] }})" label="{{ __('Delete') }}" />
        </x-dropdown>
      </div>
      @endif

      <!-- edit role modal -->
      @if ($editedRoleId === $role['id'])
      <form wire:submit.prevent="update({{ $role['id'] }})" class="">
        <div class="border-b border-gray-200 dark:border-gray-700 p-5">
          <!-- name -->
          <div class="w-full max-w-lg">
            <x-input-label for="label" :value="__('Label')" />
            <x-text-input wire:model.defer="label" id="label" wire:keydown.escape="toggleEdit(0)" dusk="name-field" class="block mt-1 w-full name" type="text" name="label" :value="old('label')" autofocus required />
            <x-input-error :messages="$errors->get('label')" class="mt-2" />
          </div>
        </div>

        <!-- permissions -->
        <div class="border-b border-gray-200 dark:border-gray-700 p-5">
          <p class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">{{ __('Permissions') }}</p>

          <div class="grid grid-cols-3 gap-1">
            @foreach ($permissions as $index => $permission)
            <x-toggle label="{{ $permission['label'] }}"
              wire:model.defer="permissions.{{ $index }}.active"
              :checked="$permission['active'] == 1"
              class="text-base"
              :wire:key="$permission['id']"
              id="toggle-{{ $permission['id'] }}" />
            @endforeach
          </div>
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
</div>

@push('scripts')
<script>
  Livewire.on('focusNameField', () => {
    document.querySelector('.name').focus();
  });
</script>
@endpush
