<template>
	<div>
		<CommissionsComponent :nameModule="nameModule" :token="$attrs.token"/>
	</div>
</template>

<script>
	import CommissionsComponent from '../../../components/admin/pages/exchange/CommissionsComponent.vue'
	export default{
    	components: {
    		CommissionsComponent
    	},
    	data:() => ({
    		nameModule: 'Commissions'
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		

    	},
		methods:{
	       	


	    }
};
</script>