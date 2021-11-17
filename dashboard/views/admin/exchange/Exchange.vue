<template>
	<div>
		<ExchangeComponent :nameModule="nameModule" />
	</div>
</template>

<script>
	import ExchangeComponent from '../../../components/admin/pages/exchange/ExchangeComponent.vue'
	export default{
    	components: {
    		ExchangeComponent
    	},
    	data:() => ({
    		nameModule: 'Users'
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		

    	},
		methods:{
	       	


	    }
};
</script>