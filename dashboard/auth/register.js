require('./../bootstrap');

import Vue from 'vue'

//Plugins


// import router from './../router/register.js';
import store from './../store/store.js'
 

// Vue.use(require('vue-moment'));
Vue.component('register', require('./../views/auth/Register.vue').default);
Vue.component('preload', require('./../global_components/PreloaderFrontComponent.vue').default);

const register = new Vue({
    el: '#register',
    store,
    // router,
});