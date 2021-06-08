<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ mix('css/projectstyle.css') }}">

        <script src="{{ mix('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ mix('js/qrcode.js') }}"></script>
        <script>
            
        //             window.addEventListener("load", () => {
        //     document.body.classList.remove("preload");
        // });

        // document.addEventListener("DOMContentLoaded", () => {
        //     const nav = document.querySelector(".nav");

        //     document.querySelector("#btnNav").addEventListener("click", () => {
        //         nav.classList.add("nav--open");
        //     });

        //     document.querySelector(".nav__overlay").addEventListener("click", () => {
        //         nav.classList.remove("nav--open");
        //     });
        // });
        </script>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/momentjs.min.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased preload" style="background-color:#e2e2e2">
        <x-jet-banner />

        <div class="min-h-screen ">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
