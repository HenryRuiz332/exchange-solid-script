<template>
	<div>
		<UsersComponent :nameModule="nameModule" />
	</div>
</template>

<script>
	import UsersComponent from '../../../components/admin/pages/users/UsersComponent.vue'
	export default{
    	components: {
    		UsersComponent
    	},
    	data:() => ({
    		nameModule: 'Clientes'
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		

    	},
		methods:{
	       	


	    }
};
</script>