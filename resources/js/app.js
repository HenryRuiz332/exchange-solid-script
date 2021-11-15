import Vue from 'vue'
require('./notification');
require('./bootstrap');


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = window.location.origin + '/'

import router from './router.js';

Vue.component('newsletter', require('./components/newsletter.vue').default);
Vue.component('my-account', require('./components/my-account/MyAccount.vue').default);


Vue.prototype.$urlApp     = window.location.origin + '/' 
Vue.prototype.$apiPath    = 'get/v1/' 

import { Form, HasError, AlertError } from 'vform'
window.Form = Form

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)


import store from './store/store.js'



Vue.component('paginate', require('./components/global/PaginationComponent.vue').default);
Vue.component('preload', require('./components/global/PreloaderComponent.vue').default);


const app = new Vue({
    el: '#app',
    store,
    router,
    Form,
    BootstrapVue
});
