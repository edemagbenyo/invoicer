
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

Vue.component('invoice-create', require('./components/create.vue'));
Vue.component('settings-index', require('./components/settings/index.vue'));
Vue.component('invoice-list', require('./components/invoices.vue'));
Vue.component('certificate-list', require('./components/certificate'));
Vue.component('certificate-create', require('./components/certificate/create.vue'));
Vue.component('survey-list', require('./components/survey'));
Vue.component('survey-create', require('./components/survey/create.vue'));
Vue.component('report-list', require('./components/report'));
Vue.component('report-create', require('./components/report/create.vue'));

import store from './store';
new Vue({
    store
}).$mount('#app');