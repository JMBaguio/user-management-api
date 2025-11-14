@props(['containerClass' => 'max-w-md', 'reverseColumns' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased ">

  <!-- Full-height 2-column grid -->
  <div class="h-screen grid grid-cols-1 md:grid-cols-2 ">

    @if($reverseColumns)
      <!-- RIGHT COLUMN: Full-height Background Image (Rendered first if reverseColumns is true) -->
      <div class="hidden md:block h-[125vh] ">
        <img
          src="{{ asset('images/registerbg.png') }}"
          alt="Login background"
          class="w-full h-[125vh]  object-cover object-center"
        >
      </div>

       <!-- LEFT COLUMN: Logo + Auth Card (Default order) -->
       <div class="flex flex-col justify-center items-center px-8 py-12 relative" style="background: linear-gradient(to bottom, 
       #F4F2ED,
       #C68A40
      );">
        <!-- Background Images at Top Right -->
        <div class="absolute bottom-0 right-0 z-0">
          <img src="{{ asset('images/Ellipse 31.png') }}" alt="Background decoration" class="w-50 h-100 ">
        </div>
        <div class="absolute bottom-0 right-0 z-0">
          <img src="{{ asset('images/Ellipse 30x.png') }}" alt="Background decoration" class="w-45 h-90 ">
        </div>
        <div class="absolute bottom-0 right-0 z-0">
          <img src="{{ asset('images/Ellipse 29x.png') }}" alt="Background decoration" class="w-45 h-100 ">
        </div>
        
        <!-- Background Images at Top Right -->
        <div class="absolute top-0 left-0 z-0">
          <img src="{{ asset('images/Ellipse 31.png') }}" alt="Background decoration" class="w-50 h-100 opacity-60 transform -rotate-[180deg]">
        </div>
        <div class="absolute top-0 left-0 z-0">
          <img src="{{ asset('images/Ellipse 30x.png') }}" alt="Background decoration" class="w-45 h-90 opacity-50 transform -rotate-[180deg]">
        </div>
        <div class="absolute top-0 left-0 z-0">
          <img src="{{ asset('images/Ellipse 29x.png') }}" alt="Background decoration" class="w-45 h-100 opacity-40 transform -rotate-[180deg]">
        </div>

        <a href="{{ Auth::check() ? (Auth::user()->role === 2 ? route('admin.dashboard') : (Auth::user()->role === 1 ? route('upcycler') : route('dashboard'))) : url('/') }}" class="flex-shrink-0 mb-8 relative z-10">
                  <img src="{{ asset('images/logo.png') }}" alt="Thrift-IT Logo" class="h-8 w-[120px] h-[100px]">
         </a>
        <div {{ $attributes->merge(['class' => 'w-full '.$containerClass.' bg-white p-4 rounded-lg shadow-md relative z-10']) }}>
          {{ $slot }}
        </div>
      </div>

    @else
      <!-- LEFT COLUMN: Logo + Auth Card (Default order) -->
      <div class="flex flex-col justify-center items-center px-8 py-12 relative"   style="background: linear-gradient(to bottom, 
        #F4F2ED,
        #EFE7DB,
        #FAF8F5,
        #E5D2B8,
        #DEC19C,
        #D7B384,
        #CFA268,
        #CD9C5E,
        #CC9B5C,
        #CA9654
      );" >
        <!-- Background Images at Bottom Left -->
        <div class="absolute bottom-0 left-0 z-0">
          <img src="{{ asset('images/Ellipse 25.png') }}" alt="Background decoration" class="w-45 h-100  ">
        </div>
        <div class="absolute bottom-0 left-0 z-0">
          <img src="{{ asset('images/Ellipse 26.png') }}" alt="Background decoration" class="w-45 h-90 ">
        </div>
        <div class="absolute bottom-0 left-0 z-0">
          <img src="{{ asset('images/Ellipse 27.png') }}" alt="Background decoration" class="w-45 h-80 ">
        </div>  
        
        <!-- Background Images at Top Right -->
        <div class="absolute top-0 right-0 z-0">
    <img src="{{ asset('images/Ellipse 25.png') }}" 
         alt="Background decoration" 
         class="w-[500px] h-50 transform -rotate-[180deg]">
</div>

<div class="absolute top-0 right-0 z-0">
    <img src="{{ asset('images/Ellipse 26.png') }}" 
         alt="Background decoration" 
         class="w-[450px] h-50 transform -rotate-[180deg]">
</div>

<div class="absolute top-0 right-0 z-0">
    <img src="{{ asset('images/Ellipse 27.png') }}" 
         alt="Background decoration" 
         class="w-[400px] h-30 transform -rotate-[180deg]">
</div>


        <a href="{{ Auth::check() ? (Auth::user()->role === 2 ? route('admin.dashboard') : (Auth::user()->role === 1 ? route('upcycler') : route('dashboard'))) : url('/') }}" class="flex-shrink-0 mb-8 relative z-10">
                  <img src="{{ asset('images/logo.png') }}" alt="Thrift-IT Logo" class="h-8 w-[120px] h-[100px]">
         </a>
        <div {{ $attributes->merge(['class' => 'w-full '.$containerClass.' bg-white p-4 rounded-lg shadow-md relative z-10']) }}>
          {{ $slot }}
        </div>
      </div>

      <!-- RIGHT COLUMN: Full-height Background Image (Default order) -->
      <div class="hidden md:block h-screen ">
        <img
          src="{{ asset('/images/loginbg.png') }}"
          alt="Login background"
          class="w-full h-screen  object-cover object-center"
        >
      </div>
    @endif
  
  </div>

</body>
</html>