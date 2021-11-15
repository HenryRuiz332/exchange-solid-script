<template>
	<Dashboard  :visitors="$attrs.visitors" :usersRegistered="$attrs.usersRegistered" />
</template>

<script>
	import Dashboard from '../../components/admin/pages/DashboardComponent.vue'
	export default{
    	components:{
    		Dashboard
    	},
    	data:() => ({
    		
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		
 
    	},
		methods:{
	       	


	    }
};
</script>