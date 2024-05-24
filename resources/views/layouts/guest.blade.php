<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
    @if (isset($title))
      {{ $title }}
    @else
      {{ config('app.name', 'Intan School Bus') }}
    @endif
  </title>

  <!-- Fonts Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/86e471e71f.js" crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body class="font-sans antialiased">
  <div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    @include('layouts.navigation-guest')

    <!-- Content -->
    <main class="flex flex-grow">
      {{ $slot }}
    </main>
  </div>
  @livewireScripts
</body>

</html>
