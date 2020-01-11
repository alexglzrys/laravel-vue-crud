/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

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
const URL_USERS = "https://jsonplaceholder.typicode.com/users";

const app = new Vue({
    el: "#app",
    data() {
        return {
            items: []
        };
    },
    methods: {
        getUsers() {
            axios.get(URL_USERS).then(response => {
                this.items = response.data;
            });
        }
    },
    created() {
        this.getUsers();
    }
});
