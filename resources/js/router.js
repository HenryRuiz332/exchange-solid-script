import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

import MyAccount from './components/my-account/my-account/MyDashboard.vue';
import Profile from './components/my-account/my-account/profile/Profile.vue';
import BankAccount from './components/my-account/my-account/bank_account/BankAccount.vue';
import Exchange from './components/my-account/my-account/exchange/Exchange.vue';


import MySettings from './components/my-account/my-account/settings/MySettings.vue';

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
            path: `/my-account/dashboard/profile/bank-account/:token`,
            name: 'my-bank-account',
            component: BankAccount,
            props: true,
        },   
         {
            path: `/my-account/dashboard/exchange/:token`,
            name: 'exchange',
            component: Exchange,
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