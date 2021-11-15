<template>
	<div>
		<Direcciones :nameModule="nameModule" :openInfo="$attrs.openInfo"/>
	</div>
</template>

<script>
	import Direcciones from '../../../components/admin/pages/users/Direcciones.vue'
	export default{
    	components: {
    		Direcciones
    	},
    	data:() => ({
    		nameModule: 'Direcciones de Clientes'
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		

    	},
		methods:{
	       	


	    }
};
</script>