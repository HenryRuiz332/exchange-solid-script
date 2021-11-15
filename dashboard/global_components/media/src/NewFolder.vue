<template>
	<div>
		<v-row class="mt-1">
 			<v-col cols="12" xs="12" sm="12" md="8" lg="8" xl="8">
				<v-text-field  label="Folder Name" v-model="formFolder.newFolder" ></v-text-field>
				<v-btn color="#4CAF50" @click="saveFolder" x-small dark ><v-icon>mdi-folder-plus</v-icon>Save folder</v-btn>
			</v-col>
			<v-col cols="12" xs="12" sm="12" md="4" lg="4" xl="4" >
 				<div>
 					<h4>Version Beta New Folder</h4>
 					<small>Only create folder in root</small>
 					<p>
 						<b>Path folder : </b>
 						<small>/</small>
 					</p>
 					<p>
 						<b>Name Folder :</b>
 						<small>{{ formFolder.newFolder }}</small>
 					 </p>
 					
 				</div>
 			</v-col>
		</v-row>
	</div>
</template>

<script>
	export default{
		props: {
			listener : Object,
			treeClick : Function,
			getDocuments : Function
		},
    	components: {

    	},
    	data:() => ({
    		formFolder : new Form ({
    			newFolder:'',
    			path: ''
    		})
    	}),
    	computed:{
    		
    	},
    	mounted(){
    		this.formFolder.newFolder = '/'
    		// if(this.listener.object.original){
    		// 	this.formFolder.newFolder = this.listener.object.original
    		// }
    	},
		methods:{
			saveFolder(){
				this.formFolder.path  =  this.listener.object.path
				this.formFolder.post(this.$urlApp + this.$apiPath + 'media-save-folder')
               .then(response => {
               		this.getDocuments()
				})
               .catch(e => {
                
               })
			}
	    }
};
</script>
<style type="text/css">
	
</style>