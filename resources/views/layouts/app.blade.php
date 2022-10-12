<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">


        <!-- Scripts -->
        <script src="{{ asset('vendor/terahertz/terahertz.js') }}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        @if(config('config.app.env') == 'staging')
            <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=xguuwkguxdjneilimwe9kw" async="true"></script>
        @endif 

    </head>
    <body class="font-sans antialiased app">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


    </body>
</html>
