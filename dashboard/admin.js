require('./bootstrap');
require('./components');
require('./env.js');

import '@fortawesome/fontawesome-free/css/all.css'
import '@mdi/font/css/materialdesignicons.css'


import Vue from 'vue'

//Plugins
import { Form, HasError, AlertError } from 'vform'
import vuetify from './plugins/vuetify/vuetify.js'


window.Form = Form
// import CKEditor from '@ckeditor/ckeditor5-vue2';
//     Vue.use( CKEditor );

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'


import router from './router/router.js';
import store from './store/store.js'
 import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)

// Vue.component(HasError.name, HasError)
// Vue.component(AlertError.name, AlertError)

// Vue.use(require('vue-moment'));



const admin = new Vue({
    el: '#admin',
    store,
    vuetify,
    router,
    icons: {
        iconfont: 'mdi', 
    },
    // VueProgressBar, 
    Form,
    BootstrapVue,
    // icons
});
