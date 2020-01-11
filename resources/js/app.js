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
            tasks: []
        };
    },
    methods: {
        getTasks() {
            const URL = "/tasks";
            axios.get(URL).then(response => {
                this.tasks = response.data;
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
