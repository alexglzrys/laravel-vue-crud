<!-- Modal que contiene el formulario de edición de tareas  -->
<form @submit.prevent="updateTask(fillTask.id)">
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-marker"></i> Editar</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="fillkeep">Actualizar tarea</label>
            <input type="text" v-model="fillTask.keep" name="kepp" class="form-control" id="fillkeep">
            <span v-for="error in errors" class="text-danger">@{{ error }}</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Actualizar
          </button>
        </div>
      </div>
    </div>
  </div>
</form>