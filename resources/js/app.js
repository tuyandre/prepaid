/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue'

// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
const router = new VueRouter({
    routes, // short for `routes: routes`
    // mode:'history',
    mode:'hash',
})
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

// V-form
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

import VueGoodTablePlugin from 'vue-good-table';

// import the styles
import 'vue-good-table/dist/vue-good-table.css'
Vue.use(VueGoodTablePlugin);

import CoreuiVue from '@coreui/vue';
Vue.use(CoreuiVue);



Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('welcome', require('./components/home/welcome.vue').default);
Vue.component('login', require('./components/auth/login.vue').default);
Vue.component('admin-register', require('./components/auth/adminRegister.vue').default);

Vue.component('dashboard', require('./components/backend/home.vue').default);



const app = new Vue({
    el: '#app',
    router,
});
