<!-- Modal que contiene el formulario de registro de tareas  -->
<form @submit.prevent="createTask">
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-create">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registrar Tarea</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="keep">Nombre de la tarea</label>
            <input type="text" v-model="keep" name="kepp" class="form-control" id="keep">
            <span v-for="error in errors" class="text-danger">@{{ error }}</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>