<x-settings-layout>
  <div class="p-5">
    <div class="md:grid md:grid-cols-3 md:gap-16">
      <div class="md:col-span-1">
        <h2 class="text-lg mb-2 font-bold">{{ __('Roles & permissions') }}</h2>
        <p>{{ __('You can configure all the roles and permissions used throughout the application.') }}</p>
      </div>

      <div class="md:mt-0 md:col-span-2">
        <livewire:settings.roles.manage-role :view="$view" />
      </div>
    </div>
  </div>
</x-settings-layout>
