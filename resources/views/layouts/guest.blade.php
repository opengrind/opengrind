<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'OpenGrind') }}</title>

  <link rel="shortcut icon" href="/img/favicon.svg">

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900 antialiased">
  <div class="min-h-screen flex flex-col sm:justify-center items-center px-2 sm:px-0 pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-lg mb-4">
      {{ $slot }}
    </div>

    <!-- language selector -->
    <div class="text-sm mb-10">
      <!-- language selector -->
      @include('layouts.language-selector')
    </div>
  </div>
</body>

</html>
