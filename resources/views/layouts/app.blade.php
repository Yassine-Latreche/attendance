<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ mix('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/projectstyle.css') }}">

    <script src="{{ mix('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ mix('js/qrcode.js') }}"></script>
    <script src="{{ mix('js/select2.min.js') }}"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/momentjs.min.js') }}" defer></script>
    <script src="{{ mix('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ mix('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ mix('js/popper.min.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ mix('favicon.ico') }}"/>

    <script>
        $.fn.select2.defaults.set("theme", "bootstrap");

    </script>
    <script src="{{ mix('js/d3.v4.js') }}"></script>
</head>

<body class="font-sans antialiased" style="background-color:#e2e2e2;">
    <x-jet-banner />

    <div class="min-h-screen">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main style="
            margin-top: 75px;
            max-width: 70vw;
            margin-left: calc(10vw + 250px);
            margin-right: calc(10vw);">
            @include('flash-message')
            {{ $slot }}
        </main>
    </div>
    <div class="container">
        <img src="{{ mix('images/biglogo.png') }}" alt="logo"
            style="position: fixed; bottom: 0px; right:0px; z-index:-2;opacity:0.2;">

    </div>
    @stack('modals')

    @livewireScripts
</body>

</html>