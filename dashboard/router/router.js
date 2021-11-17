import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)


import Error404 from '../views/errors/404'
import Test from '../views/Test.vue'


import Admin from '../components/admin/AdminApp.vue';
import DashboardContent from '../views/admin/Dashboard.vue';

import Users from '../views/admin/users/Users.vue';

import Exchange from '../views/admin/exchange/Exchange.vue';
import Commissions from '../views/admin/exchange/Commissions.vue';


import Direcciones from '../views/admin/users/Direcciones.vue';







const router = new VueRouter({
	mode: 'history',
	routes: [
        {
            path: `/dashboard/main/${localStorage.getItem('session_app')}`,
            name: 'admin',
            component: DashboardContent,
            props: true,
        },

        {
            path: '*',
            name: 'error', 
            component: Error404
        },
       
        {
            path: '/dashboard/users/:token',
            name: 'users',
            component: Users,
            props: true,
            
        },

        {
            path: '/dashboard/exchange/:token',
            name: 'exchange',
            component: Exchange,
            props: true,
            
        },
        {
            path: '/dashboard/exchange/commissions/:token',
            name: 'commissions',
            component: Commissions,
            props: true,
            
        },


         {
            path: '/dashboard/direcciones/:token',
            name: 'direcciones',
            component: Direcciones,
            props: true,
            
        },
       

            {
                path: '/dashboard/pru/:token',
                name: 'pru',
                component: Test,
                props: true,
            },
          

        


          
     ],

     linkExactActiveClass: 'active',
});

export default router;

