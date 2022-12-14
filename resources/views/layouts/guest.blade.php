<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} Guest Layout</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <script src="{{ asset('vendor/terahertz/terahertz.js') }}"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @if(config('config.app.env') == 'staging')
            <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=xguuwkguxdjneilimwe9kw" async="true"></script>
        @endif 

    </head>
    <body class="guest">    

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
