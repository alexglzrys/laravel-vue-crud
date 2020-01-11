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
        <div class="container" id="app">
            <div class="jumbotron">
                <h1 class="display-4">
                    <i class="fa fa-camera"></i> Laravel con VueJS y Axios</h1>
                <p class="lead">Ejemplo de conexión a una API de terceros llamada jsonplaceholder</p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h2>Listado de Elementos</h2>
                    <ul class="list-group">
                        <li v-for="item in items" :key="item.id" class="list-group-item">
                            <i class="fa fa-user"></i> @{{ item.name }}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <h2>Formato JSON</h2>
                    <pre>@{{ $data }}</pre>
                </div>
            </div>
        </div>

        <!-- Scripts - Resultado de la compilación de resources/js/app.js -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
