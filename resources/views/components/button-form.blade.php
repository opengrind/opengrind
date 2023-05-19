@if ($attributes->has('href'))
<a {{ $attributes->merge(['class' => 'relative dark:text-gray-100 dark:box-s bg-white dark:bg-gray-800 border-zinc-900 dark:border-zinc-100 rounded button']) }} href="{{ $href }}">
  @if ($attributes->has('save'))
  <span class="flex items-center">
    <x-heroicon-o-plus-small class="icon relative mr-1 inline h-5 w-5" />
    <span>{{ $slot }}</span>
  </span>
  @else
  {{ $slot }}
  @endif
</a>

@elseif ($attributes->has('secondary'))
<span {{ $attributes->merge(['class' => 'cursor-pointer relative dark:text-gray-100 dark:box-s bg-white dark:bg-gray-800 border-zinc-900 dark:border-zinc-100 rounded button']) }}>
  {{ $slot }}
</span>

@else
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'relative dark:text-gray-100 dark:box-s bg-white dark:bg-gray-800 border-zinc-900 dark:border-zinc-100 rounded save button']) }}>
  @if ($attributes->has('save'))
  <span class="flex items-center">
    <x-heroicon-o-plus-small class="icon relative mr-1 inline h-5 w-5" />
    <span>{{ $slot }}</span>
  </span>
  @else
  {{ $slot }}
  @endif
</button>
@endif

<style>
  .button {
    --tw-shadow: 2px 2px 0 #191a1b !important;
    border-width: 1px !important;
    box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow) !important;
    display: inline-block !important;
    position: relative !important;
    text-decoration: none !important;
    transition-duration: 0.15s !important;
    transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter,
      backdrop-filter, -webkit-backdrop-filter !important;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;
    line-height: 1.25rem !important;
    padding-left: 12px;
    padding-right: 12px;
    padding-top: 3px;
    padding-bottom: 3px;
  }

  .button:hover {
    box-shadow: none !important;
    transform: translate(2px, 2px);
  }

  .button:disabled {
    box-shadow: none;
    transform: translate(0, 0);
  }

  .button.save {
    background-color: #fcf27e;
  }
</style>
