<x-settings-layout>
  <!-- personal information -->
  <div class="p-5 border-b border-gray-200">
    <livewire:profile.settings.update-profile :view="$view" />
  </div>

  <!-- profile visibility -->
  <div class="p-5 border-b border-gray-200">
    <livewire:profile.settings.update-profile-visibility :view="$view" />
  </div>

  <!-- locale -->
  <div class="p-5 border-b border-gray-200">
    <livewire:profile.settings.update-timezone :view="$view" />
  </div>

  <!-- date of birth -->
  <div class="p-5">
    <livewire:profile.settings.update-date-of-birth :view="$view" />
  </div>
</x-settings-layout>
