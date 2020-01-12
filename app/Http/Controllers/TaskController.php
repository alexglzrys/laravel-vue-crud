<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Para saber que número de pagina entregar, laravel verifica el valor pasado en la cadena de consulta ?page, la cual hace de forma implicita en el métood paginate. (No es necesario inyectar el objeto Response $request)

        // Paginar los resultados y mandarlos al FrontEnd
        $tasks = Task::orderBy('id', 'DESC')->paginate(3); 
        // Laravel automáticamente convierte a JSON los arreglos enviados como respuesta
        return [
            // Información meta de paginación
            'pagination' => [
                'total'         => $tasks->total(), 
                'current_page'  => $tasks->currentPage(),
                'per_page'      => $tasks->perPage(),
                'last_page'     => $tasks->lastPage(),
                'from'          => $tasks->firstItem(),
                'to'            => $tasks->lastItem()
            ],
            // Data
            'tasks' => $tasks
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCreateRequest $request)
    {
        // Esta instrucción funciona si en el modelo Task tenemos activada la asignación masiva de algunos campos
        Task::create($request->all());
        return response()->json([
            'message' => 'Tarea creada satisfactoriamente en el sistema'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, $id)
    {
        // Buscar la tarea y actualizarla con la data que viaja en el cuerpo de la petición
        Task::findOrFail($id)->update($request->all());
        return response()->json([
            'message' => 'Registro con ID ' . $id . ' actualizado satisfactoriamente en el sistema'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json([
            'message' => 'El registro con id '. $task->id .' fue eliminado correctamente',
        ]);
    }
}
