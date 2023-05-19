<ul class="list">
  @foreach ($layout['locales'] as $locale)
  <li class="inline mr-2">
    @if ($layout['currentLocale'] !== $locale['shortCode'])
    <x-link :route="$locale['url']" class="text-sm">{{ $locale['name'] }}</x-link>
    @else
    <span class="text-gray-500 text-sm">{{ $locale['name'] }}</span>
    @endif
  </li>
  @endforeach
</ul>
