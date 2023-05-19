<button type="submit" {{ $attributes->merge(['class' => 'transition-all text-blue-500 underline hover:text-blue-800 hover:underline dark:text-gray-400 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800']) }}>
  {{ $slot }} </button>
