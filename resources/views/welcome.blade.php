<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/projectstyle.css') }}">
    
        <title>Laravel</title>
        <script src="{{ mix('js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ mix('js/bootstrap.min.js') }}" defer></script>
        <link rel="shortcut icon" href="{{ mix('favicon.ico') }}"/>

    </head>
   <body style="margin: 0px !important;">
    <div id="hello" style="height: 100vh; width: 100vw; background-color:#e2e2e2">
    <div class="container">
        <div class="row">
            <div class="container">
            <img src="{{ mix('/images/logo.png') }}" width="120" height="120" alt="Attendance Project">

            </div>
    
        </div>
    </div>
    </div>       
    <div id="professor" style="height: 100vh; width: 100vw; background-color:#009879"></div>       
    <div id="student" style="height: 100vh; width: 100vw; background-color:#4968ff"></div>       
</body>
</html>
