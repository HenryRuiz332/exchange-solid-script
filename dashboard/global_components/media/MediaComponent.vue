<template>
	<div>
		<div class="iq-card iq-card-block iq-card-stretch p-3 text-white">
			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">
					<v-btn @click="openDialogMediaImages">Open Media</v-btn>
				</v-col>
			</v-row>

			<DialogMedia 	:closeDialogMedia="closeDialogMedia" 
							:dialog="dialog" 
							:token="token" 
							:openDialogMediaImages="openDialogMediaImages"></DialogMedia>

		</div>
	</div>
</template>

<script>
	import DialogMedia from './DialogMedia.vue'
	export default{
    	components: {
    		DialogMedia
    	},
    	props: {
    		token: String
    	},
    	data:() => ({
    		dialog : false
    	}),
    	computed:{
    	},
    	created(){
    		
    	},
		methods:{
			openDialogMediaImages(){
				this.dialog = true
			},
			closeDialogMedia(){
				this.dialog = false
			}
	    }
};
</script>
<style type="text/css">
	
</style>