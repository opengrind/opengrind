<x-app-layout :organization="$organization">
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-0 px-6 shadow-md">
      <!-- header -->
      <div class="flex flex-wrap mx-auto bg-white rounded-t-lg top-0 z-30">
        <div class="flex items-center justify-between w-full px-4 py-6 h-8 border-b h-18 border-slate-200">
          <div class="flex items-center justify-center w-full space-x-1.5 font-bold">
            <span class="mr-2 ">🚧</span>
            {{ __('Organization settings') }}
          </div>
        </div>
      </div>

      <!-- body -->
      <div class="w-full rounded-b-lg mx-auto bg-white max-w-7xl ">
        <div class="flex w-full divide-x divide-slate-200">
          <nav class="pt-5 min-w-[20%] max-w-[25%] space-y-6 sidebar whitespace-nowrap p-3">
            <ul>
              <li class="uppercase text-xs mb-2 font-light">{{ __('Organization profile') }}</li>

              <!-- user profile -->
              <li @class([ 'grow bg-slate-100 hover:bg-slate-100 pl-2 pr-8 py-1 rounded cursor-pointer mb-8 flex items-center group'=> request()->route()->named('organization.settings.index'),
                'hover:bg-slate-100 pl-2 pr-8 py-1 rounded cursor-pointer mb-8 flex items-center group' => !request()->route()->named('organization.settings.index')])>
                <x-heroicon-o-user-circle class="w-4 h-4 mr-2 text-cyan-800 group-hover:text-cyan-800" />

                <x-link :route="route('organization.settings.index', ['organization' => $organization->slug])" class="no-underline text-slate-800">{{ __('Information') }}</x-link>
              </li>

              <li class="uppercase text-xs mb-2 font-light">{{ __('Access') }}</li>

              <!-- roles and permissions -->
              <li @class([ 'grow bg-slate-100 hover:bg-slate-100 pl-2 pr-8 py-1 rounded cursor-pointer mb-1 flex items-center group'=> request()->route()->named('settings.emails.index'),
                'hover:bg-slate-100 pl-2 pr-8 py-1 rounded cursor-pointer mb-1 flex items-center group' => !request()->route()->named('settings.emails.index')])>
                <x-heroicon-o-lock-closed class="w-4 h-4 mr-2 text-cyan-800 group-hover:text-cyan-800" />

                <x-link :route="route('organization.settings.roles.index', ['organization' => $organization->slug])" class="no-underline text-slate-800">{{ __('Roles & permissions') }}</x-link>
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
