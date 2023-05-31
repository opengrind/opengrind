@props(['value'])

<label {{ $attributes->merge(['class' => 'mt-1 text-xs text-gray-500 dark:text-gray-300']) }}>
  {{ $value ?? $slot }}
</label>
