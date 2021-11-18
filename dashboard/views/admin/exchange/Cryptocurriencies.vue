<template>
	<div>
		<CryptocurrienciesComponent :nameModule="nameModule" :token="$attrs.token"/>
	</div>
</template>

<script>
	import CryptocurrienciesComponent from '../../../components/admin/pages/exchange/CryptocurrienciesComponent.vue'
	export default{
    	components: {
    		CryptocurrienciesComponent
    	},
    	data:() => ({
    		nameModule: 'Cryptocurriencies'
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		

    	},
		methods:{
	       	


	    }
};
</script>