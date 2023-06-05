<x-app-layout>
  <div class="relative mt-16 sm:mt-24 mb-10">
    <div class="mx-auto max-w-lg bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-lg">
      <form method="POST" action="{{ route('organization.store') }}">
        @csrf
        <div class="px-6 py-4 relative">
          <div class="mx-auto mb-4 relative w-10 h-10 overflow-hidden rounded-full ring-2 ring-gray-500 dark:ring-gray-500 dark:bg-gray-600">
            <x-heroicon-o-building-office-2 class="text-gray-500 justify-center w-12 h-12" />
          </div>
          <h1 class="font-bold text-lg text-center mb-2">{{ trans('Create an organization') }}</h1>
          <h3 class="text-sm text-gray-700 mb-4 text-center">{{ trans('Organizations are shared accounts where teams can collaborate across many projects at once.') }}</h3>

          <!-- Name -->
          <div class="mb-4">
            <x-input-label for="name" :value="trans('Name')" />
            <x-text-input id="name" autofocus class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            <x-input-help>{{ trans('No blank space and no special characters. It will be used to identify the organization on OpenGrind.') }}</x-input-help>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <!-- Visibility -->
          <div class="space-y-2">
            <p class="font-bold mb-2 text-sm">{{ trans('Visibility') }}</p>
            <div class="flex items-center gap-x-2">
              <input id="hide" required value="0" name="is_public" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" checked>
              <label for="hide" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Hide this organization from anyone who is not a member') }}</label>
            </div>
            <div class="flex items-center gap-x-2">
              <input id="show" required value="1" name="is_public" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
              <label for="show" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Show the organization to everyone') }}</label>
            </div>
          </div>
        </div>

        <div class="border-t flex items-center justify-between px-6 py-4 bg-gray-50">
          <x-button-form :href="route('home.index')" icon="o-arrow-small-left" icon-position-left>
            {{ trans('Back') }}
          </x-button-form>

          <x-button-form class="ml-4" primary>
            {{ trans('Register') }}
          </x-button-form>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
