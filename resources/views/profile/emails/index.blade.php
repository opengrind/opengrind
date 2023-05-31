<x-settings-layout>
  <!-- manage emails -->
  <div class="p-5 border-b border-gray-200">
    <livewire:profile.settings.manage-emails :view="$view" />
  </div>

  <!-- primary email -->
  <div class="p-5">
    <livewire:profile.settings.manage-primary-email :view="$view" />
  </div>
</x-settings-layout>
