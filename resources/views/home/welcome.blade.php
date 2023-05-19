<x-guest-layout>

  <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

  <div class="text-center font-bold mb-4 text-gray-600 dark:text-gray-400">
    {{ __('Does your company already exist in OpenGrind?') }}
  </div>

  <div class="mb-8 text-center text-gray-600 dark:text-gray-400">
    {{ __('You can add your company or join your existing company if it already exists.') }}
  </div>

  <div class="mt-4 justify-between mb-4">
    <div class="text-center">
      <!-- create a company -->
      <a href="{{ route('create_company.index') }}" dusk="link-create-company" class="mb-4 border group border-gray-200 rounded-lg p-5 flex hover:bg-gray-50 cursor-pointer hover:border-gray-300 items-center">
        <x-heroicon-s-plus-circle class="w-5 h-5 text-gray-400 group-hover:text-emerald-600 mr-2" />

        <span class="">
          {{ __('Add your company') }}
        </span>
      </a>
      <a href=" {{ route('create_company.index') }}" dusk="" class="mb-4 border group border-gray-200 rounded-lg p-5 flex hover:bg-gray-50 cursor-pointer hover:border-gray-300 items-center">
        <x-heroicon-s-user-plus class="w-5 h-5 text-gray-400 group-hover:text-emerald-600 mr-2" />

        <span class="">
          {{ __('Join an existing company') }}
        </span>
      </a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
      @csrf

      <x-button-as-link class="text-xs block ">{{ __('Or you can also log out') }}</x-button-as-link>
    </form>
  </div>
</x-guest-layout>
