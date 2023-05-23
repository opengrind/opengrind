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
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md bg-white px-3 py-1.5 font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50']) }}>
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
  .button:hover {
    box-shadow: rgb(64 68 82 / 8%) 0px 3px 9px 0px, rgb(64 68 82 / 8%) 0px 2px 5px 0px;
  }

  .button:disabled {
    box-shadow: none;
    transform: translate(0, 0);
  }

  .button.save {
    background-color: #fcf27e;
  }
</style>
