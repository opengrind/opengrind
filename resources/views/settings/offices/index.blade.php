<x-settings-layout>
  <div class="p-5">
    <div class="md:grid md:grid-cols-3 md:gap-16">
      <div class="md:col-span-1">
        <h2 class="text-lg mb-2 font-bold">{{ __('Offices') }}</h2>
        <p>{{ __('You can have one or more offices, and designate which office is the main office. You can also choose to not have any office at all if you are full remote.') }}</p>
      </div>

      <div class="md:mt-0 md:col-span-2">
        <livewire:settings.offices.manage-office :view="$view" />
      </div>
    </div>
  </div>
</x-settings-layout>
