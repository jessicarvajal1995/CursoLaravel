
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 

// estos son los componentes que llamare en las etiquetas de template para las vistas.
Vue.component('list-of-pokemons', require('./components/Pokemons/list.vue'));
Vue.component('spinner', require('./components/widgets/spinner.vue'));
Vue.component('modal-button', require('./components/Pokemons/modal-button.vue'));
Vue.component('create-form-pokemon', require('./components/Pokemons/add.vue'));

const app = new Vue({
    el: '#app'
});
