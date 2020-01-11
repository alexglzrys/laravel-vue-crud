<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles - Resultado de la compilación de resources/sass/app.scss -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
       
    </head>
    <body>
        <!-- Plantilla perteneciente a la aplicación Vue - FrontEnd -->
        <div class="container" id="app">
           @yield('content')
        </div>

        <!-- Scripts - Resultado de la compilación de resources/js/app.js -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
