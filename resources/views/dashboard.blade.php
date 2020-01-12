<!-- Extender la plantilla principal de Vue -->
@extends('app')

@section('content')
  <!-- Esta plantilla pertenece a una instancia de Vue (aplicación) que hace referencia al ID #vue-crud  -->
  <div id="vue-crud" class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <h1 class="display-4"><i class="fas fa-database"></i> CRUD Laravel y Vuejs</h1>
        <p class="lead">Conexión a base de datos y solicitud de servicios a través de Axios</p>
      </div>
    </div>
    <div class="col-sm-7">
      <table class="table table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle">ID</th>
            <th class="align-middle">Nombre de la Tarea</th>
            <th colspan="2">
              <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-create">
                <i class="fas fa-plus-circle"></i> Nueva Tarea
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id">
            <td width="20px">@{{ task.id }}</td>
            <td>@{{ task.keep }}</td>
            <td width="110px">
              <a href="#" @click.prevent="editTask(task)" class="btn btn-warning btn-sm btn-block">
                <i class="fas fa-edit"></i> Editar
              </a>
            </td>
            <td width="110px">
              <a href="#" @click.prevent="deleteTask(task)" class="btn btn-danger btn-sm btn-block">
                <i class="fas fa-trash"></i> Eliminar
              </a>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Controles de Paginación -->
      <nav>
        <ul class="pagination">
          <li class="page-item">
            <a href="#" class="page-link">Anterior</a>
          </li>
          <!-- Numeración dinámica -->
          <li class="page-item"><a href="#" class="page-link">1</a></li>
          <li class="page-item active"><a href="#" class="page-link">2</a></li>
          <li class="page-item"><a href="#" class="page-link">3</a></li>
          <!--  -->
          <li class="page-item">
            <a href="#" class="page-link">Siguiente</a>
          </li>
        </ul>
      </nav>

    </div>
    <div class="col-sm-5 bg-secondary">
      <pre class="text-white">@{{ $data }}</pre>
    </div>

    <!-- Incluir archivos parciales de nuestra aplicación Vue -->
    @include('partials.create')
    @include('partials.edit')
  </div>
@endsection