/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Si se desea agregar librerías de terceros de JS en el proyecto. se debe hacer lo siguiente
 * 1. instalar mediante npm mediante el flag -D
 * 2. requerir la librería o modulo en este archivo.
 *      window.library = require('library')
 *
 */
window.toastr = require("toastr");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * Nota: Siempre es necesario compilar los archivos JS/VUE/CSS/SCSS con laravel mix.
 * npm run dev || npm run watch
 *
 * De lo contario, los cambios generados jamás se inyectarán en los archivos finales (public/js  --- public/css)
 */

const app = new Vue({
    el: "#vue-crud",
    data() {
        return {
            tasks: [],
            keep: null,
            errors: [],
            // Modelo que contiene una copia de los datos durante el proceso de edición (modal form)
            fillTask: {
                id: "",
                keep: ""
            }
        };
    },
    methods: {
        // Recuperar todos los registros del tipo Task -- Controller@index
        getTasks() {
            const URL = "/tasks";
            axios.get(URL).then(response => {
                // La respuesta del Backend es un JSON complejo cuyos datos se encuentran en tasks.data
                this.tasks = response.data.tasks.data;
                console.log(response.data);
            });
        },

        // Eliminar un registro del tipo Task --- Controller@destroy
        deleteTask(task) {
            const URL = `/tasks/${task.id}`;
            axios.delete(URL).then(response => {
                // Recuperar nuevamente todas las tareas registradas en el backend para mostrarlas en la vista.
                // En caso contrario, el usuario tiene que refrescar la página
                this.getTasks();
                // Notificar al usuario mediante la librería Toastr.js de que la operación de eliminación fue correcta
                toastr.success(
                    response.data.message,
                    "Información del sistema"
                );
            });
        },

        // Grabar registro de tipo Task --- Controller@store
        createTask() {
            const URL = "/tasks";
            const data = {
                keep: this.keep
            };
            axios
                .post(URL, data)
                .then(response => {
                    // Cargar nuevamente el listado de tareas registradas en la base de datos
                    this.getTasks();
                    this.keep = null;
                    this.errors = [];
                    // Cerrar el modal automáticamente
                    $("#modal-create").modal("hide");
                    // Notificar al usuario acerca del exito de la operación
                    toastr.success(
                        response.data.message,
                        "Información del sistema"
                    );
                })
                .catch(error => {
                    // Mostrar el error o conjunto de errores al usuario
                    console.log(error.response);
                    this.errors = error.response.data.errors;
                });
        },

        // Editar un registro de tipo Task
        editTask(task) {
            // Llenar el modelo con los datos de la tarea a editar
            this.fillTask.id = task.id;
            this.fillTask.keep = task.keep;
            // Mostrar el modal con el formulario de edición (los inputs ya estarían rellenados con la info a editar)
            $("#modal-edit").modal("show");
        },

        // Actualizar un registro del tipo Task --- Controller@update
        updateTask(id) {
            const URL = `/tasks/${id}`;
            axios
                .put(URL, this.fillTask)
                .then(response => {
                    // Solicitar las las tareas disponibles en la base de datos
                    this.getTasks();
                    // Resetear el modelo de edición de tarea
                    this.fillTask = {
                        id: "",
                        keep: ""
                    };
                    // Resetear los posibles errores
                    this.errors = [];
                    // Ocultar el modal de edición de tareas
                    $("#modal-edit").modal("hide");
                    // Mostrar feedback al usuario
                    toastr.success(
                        response.data.message,
                        "Información del sistema"
                    );
                })
                .catch(error => {
                    console.log(error.response);
                    this.errors = error.response.data.errors;
                });
        }
    },
    created() {
        this.getTasks();
    }
});

/**
 * Trabajar con JQuery
 *
 * Podemos escribir este código en un archivo JS separado en resources/js, y requerirlo dentro de este archivo
 *
 * 1. Al instalar el componente de laravel/ui mediante composer, se agregan los comandos artisan necesarios para generar
 * el scaffolding frontend con bootstrap, vue, react. Así como la opción para generar generar el scafolding para el registro y login mediante el flag --auth
 *
 * php artisan ui vue       - genera el scaffolding frontend para trabajar con Vue (agrega adicional jQuery, bootstrap)
 * php artisan preset none  - retira el scaffolding frontend del proyecto laravel
 *
 * Al finalizar la generación del scaffolding, es necesario instalar los paquetes npm necesarios
 *
 * npm install
 *
 * Posteriormetne, es necesario compilar los archivos app.css y aṕp.js dentro de resources, a la carpeta public.
 * Cabe mencionar que todo el código JS/CSS se escribe en los archivos de recursos, y al compilarlos, laravel los
 * consume desde la carpeta publica con el helper asset('')
 *
 * npm run dev
 *
 * Finalmente, es necesario linkear los archivos publicos generados en las vistas blade correspondientes,
 * todo ello mediante el helper asset().
 *
 * <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 * <script src="{{ asset('js/app.js') }}" defer></script>
 */

$(document).ready(function() {
    console.log("Super, jQuey trabajando desde laravel");

    $(".list-group").on("click", ".list-group-item", function(event) {
        $(this).css({
            backgroundColor: "teal",
            color: "white"
        });
    });
});
