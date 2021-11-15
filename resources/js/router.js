import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

import MyAccount from './components/pages/my-account/MyDashboard.vue';
import Profile from './components/pages/my-account/profile/Profile.vue';
import MySettings from './components/pages/my-account/settings/MySettings.vue';

const router = new VueRouter({
	mode: 'history',
	routes: [
        {
            path: `/my-account/dashboard/:token`,
            name: 'my-account',
            component: MyAccount,
            props: true,
        }, 
        {
            path: `/my-account/dashboard/profile/:token`,
            name: 'my-profile',
            component: Profile,
            props: true,
        },   
        {
            path: `/my-account/dashboard/settings/:token`,
            name: 'my-settings',
            component: MySettings,
            props: true,
        },   
     ],
     linkExactActiveClass: 'active',
});

export default router;