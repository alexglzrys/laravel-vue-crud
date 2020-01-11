<!-- Extender la plantilla principal de Vue -->
@extends('app')

@section('content')
  <!-- Esta plantilla pertenece a una instancia de Vue (aplicación) que hace referencia al ID #vue-crud  -->
  <div id="vue-crud" class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <h1 class="display-4">CRUD Laravel y Vuejs</h1>
        <p class="lead">Conexión a base de datos y solicitud de servicios a través de Axios</p>
      </div>
    </div>
    <div class="col-sm-7">
      <table class="table table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Nombre de la Tarea</th>
            <th colspan="2">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id">
            <td width="10px">@{{ task.id }}</td>
            <td>@{{ task.keep }}</td>
            <td width="10px"><a href="#" class="btn btn-warning btn-sm">Editar</a></td>
            <td width="10px">
              <a href="#" @click.prevent="deleteTask(task)" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-5 bg-secondary">
      <pre class="text-white">@{{ $data }}</pre>
    </div>
  </div>
@endsection