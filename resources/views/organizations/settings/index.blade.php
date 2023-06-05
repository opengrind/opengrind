<x-organization-settings-layout :organization="$organization" :name="$view['name']">
  <!-- organization information -->
  <div class="p-5 border-b border-gray-200">
    <livewire:organization.settings.update-organization-details :view="$view" />
  </div>
</x-organization-settings-layout>
