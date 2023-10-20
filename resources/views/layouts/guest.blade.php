<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="csrf-token" content="{{ csrf_token() }}">


 <title>Sistema de correspondencia</title>

 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 <link rel="shortcut icon" href="{{ asset('img/profile.ico') }}" type="image/x-icon">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])

 <!-- Styles -->
 @livewireStyles
</head>

<body class="font-sans antialiased">
    <main>
        {{$slot}}
    </main>

 @stack('modals')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
 @livewireScripts
</body>

</html>
