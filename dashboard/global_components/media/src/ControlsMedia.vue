<template>
	<div>
		<div>
			<v-system-bar window>
			<span class="mr-4" style="cursor:pointer"  @click="getDocuments">
	            <v-icon style="cursor:pointer" color="#10f537" @click="getDocuments">mdi-tree </v-icon> Root
	        </span>
	        <span class="mr-4" style="cursor:pointer" @click="newFolder">
	            <v-icon style="cursor:pointer" color="#e3d420">mdi-folder-plus </v-icon> New Folder
	        </span>
	        <span  style="cursor:pointer" @click="uploadFile" v-if="listener.object.isFolder">
	        	<v-icon color="#20bfe3" dark>mdi-cloud-upload</v-icon> Upload File
	        </span>        
	        <v-spacer></v-spacer>
	       <!--  <a v-if="localStorageRole == 1"
	            :href="`#/gestor-documentos/`+localStorageUser" class="action-buttons mr-4">
	            <span style="cursor:pointer">
	                <v-icon color="black">mdi-arrow-left</v-icon>Atras
	            </span>
	        </a>      -->   
	        <span class="mr-4"
	            style="cursor:pointer" @click="getDocuments">
	            <v-icon color="#000000" dark>mdi-reload</v-icon> Reload
	        </span>
	        <!-- <a  class="mr-2">
	            <span style="cursor:pointer">
	                <v-icon color="black">mdi-eye</v-icon> View
	            </span>
	        </a> -->
	        <span class="mr-4" style="cursor:pointer" @click="deleteItem" v-if="listener.object.isFolder == false">
	            <v-icon color="#E53935" dark>mdi-delete </v-icon> Delete
	        </span>
	        <span class="mr-4" style="cursor:pointer" v-if="listener.object.isFolder == false"> 
	            <v-icon color="#0658ed">mdi-cloud-download</v-icon> Download
	        </span>
	        </v-system-bar>
	    </div>
	</div>
</template>

<script>
	export default{
		props: {
			listener : Object,
			getDocuments: Function,
			deleteItem: Function,
			uploadFile: Function,
			newFolder: Function,
			token: String,
		},
    	components: {

    	},
    	data:() => ({
    		
    	}),
    	computed:{
    		
    	},
    	created(){
    		
    	},
		methods:{

	    }
};
</script>
<style type="text/css">
	
</style>