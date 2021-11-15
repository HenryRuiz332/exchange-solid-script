import Vue from 'vue'
require('./notification');


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = window.location.origin + '/'

import router from './router.js';

Vue.component('newsletter', require('./components/newsletter.vue').default);
Vue.component('my-account', require('./components/pages/MyAccount.vue').default);


Vue.prototype.$urlApp     = window.location.origin + '/' 
Vue.prototype.$apiPath    = 'get/v1/' 

import { Form, HasError, AlertError } from 'vform'
window.Form = Form

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)

const app = new Vue({
    el: '#app',
    router,
    Form,
    BootstrapVue
});
