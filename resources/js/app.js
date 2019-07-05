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
    { path: '/company', component: require('./components/company/CompanyComponent.vue').default },
    { path: '/user', component: require('./components/user/UserComponent.vue').default },
    { path: '/profile', component: require('./components/profile/ProfileComponent.vue').default },
    { path: '/developer', component: require('./components/developer/DeveloperComponent.vue').default },
    { path: '/role', component: require('./components/role/RoleComponent.vue').default },
    { path: '*', component: require('./components/NotFoundComponent.vue').default },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

/**
 * Gate
 */
import Gate from './Gate';
Vue.prototype.$gate = new Gate(window.user);

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
Vue.filter('formatDateTime', function(value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY HH:mm:ss')
    }
});

/**
 * Vue Progressbar
 * https://github.com/hilongjw/vue-progressbar
 */
import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#0e4d9a',
    failedColor: '#e3342f',
    thickness: '3px'
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
    position: 'bottom-right',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

/**
 * Fire
 */
window.Fire = new Vue();

/**
 * Laravel Passport
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

/**
 * Not Found
 */
Vue.component(
    'not-found',
    require('./components/NotFoundComponent.vue').default
);

/**
 * pretty-checkbox
 * https://github.com/hamed-ehtesham/pretty-checkbox-vue/blob/master/README.md
 */
import PrettyCheckbox from 'pretty-checkbox-vue';
Vue.use(PrettyCheckbox);

/**
 * Vue Content Loading
 * https://lucasleandro1204.github.io/vue-content-loading
 */
import { VclFacebook } from 'vue-content-loading';
Vue.component('vcl-facebook', VclFacebook);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});