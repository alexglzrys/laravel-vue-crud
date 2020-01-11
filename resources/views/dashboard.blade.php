<!-- Extender la plantilla Vue de nuestra aplicación principal -->
@extends('app')

@section('content')
  <div id="vue-crud" class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <h1 class="display-4">CRUD Laravel y Vuejs</h1>
        <p class="lead">Conexión a base de datos y solicitud de servicios a través de Axios</p>
      </div>
    </div>
    <div class="col-sm-7">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tarea</th>
            <th colspan="2">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="10px">1</td>
            <td>Correr 10km</td>
            <td width="10px"><a href="#" class="btn btn-warning btn-sm">Editar</a></td>
            <td width="10px"><a href="#" class="btn btn-danger btn-sm">Eliminar</a></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-5">
      <pre></pre>
    </div>
  </div>
@endsection