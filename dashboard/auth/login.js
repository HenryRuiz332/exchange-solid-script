require('./../bootstrap');

import Vue from 'vue'

//Plugins


// import router from './../router/login.js';
import store from './../store/store.js'
 

// Vue.use(require('vue-moment'));
Vue.component('login', require('./../views/auth/Login.vue').default);
Vue.component('preload', require('./../global_components/PreloaderFrontComponent.vue').default);

const login = new Vue({
    el: '#login',
    store,
    // router,
});
