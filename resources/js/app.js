/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The Vue Router
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
    { path: '/home', redirect: '/dashboard' },
    { path: '/dashboard', component: require('./components/DashboardComponent.vue').default },
    { path: '/company', component: require('./components/CompanyComponent.vue').default },
    { path: '/user', component: require('./components/UserComponent.vue').default }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

/**
 * The v-form
 * https://github.com/cretueusebiu/vform
 */
import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

/**
 * Filter
 */
Vue.filter('upText', function(value) {
    if (value) {
        return value.charAt(0).toUpperCase() + value.slice(1);
    }
});

import moment from 'moment';
Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY')
    }
});

/**
 * Vue Progressbar
 * https://github.com/hilongjw/vue-progressbar
 */
import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#3490dc',
    failedColor: '#e3342f',
    height: '3px'
};
Vue.use(VueProgressBar, options);

/**
 * SweetAlert 2
 * https://sweetalert2.github.io/#download
 */
import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

/**
 * Fire
 */
window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
