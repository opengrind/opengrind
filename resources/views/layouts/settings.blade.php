<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-0 px-6 shadow-sm">
      <!-- header -->
      <div class="flex flex-wrap mx-auto bg-white rounded-t-lg top-0 z-30">
        <div class="flex items-center justify-between w-full px-4 py-6 h-8 border-b h-18 border-slate-200">
          <div class="flex items-center justify-start w-[300px] text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 text-gray-600">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>

            <x-link :route="route('home.index')">{{ __('Back to home') }}</x-link>
          </div>
          <div class="flex items-center justify-center w-full space-x-1.5 font-bold">
            {{ __('Personal account settings') }}
          </div>
          <div class="flex justify-end w-[300px]">
            &nbsp;
          </div>
        </div>
      </div>

      <!-- body -->
      <div class="w-full rounded-b-lg mx-auto bg-white max-w-7xl ">
        <div class="flex w-full divide-x divide-slate-200">
          <nav class="pt-5 max-w-[25%] space-y-6 sidebar whitespace-nowrap p-3">
            <ul>
              <li class="uppercase text-xs mb-2 font-light">{{ __('User profile') }}</li>

              <!-- user profile -->
              <li @class([ 'bg-slate-100 hover:bg-slate-100 pl-2 pr-8 py-1 rounded cursor-pointer mb-1 flex items-center group'=> request()->route()->named('settings.profile.index'),
                'hover:bg-slate-100 pl-2 pr-8 py-1 rounded cursor-pointer mb-1 flex items-center group' => !request()->route()->named('settings.profile.index')])>
                <x-heroicon-s-user-circle class="w-4 h-4 mr-2 text-cyan-800 group-hover:text-cyan-800" />

                <x-link :route="route('settings.profile.index')" class="no-underline text-slate-800">{{ __('Profile') }}</x-link>
              </li>
            </ul>
          </nav>

          <!-- right part -->
          <div class="flex flex-col min-w-[75%] w-full">
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
