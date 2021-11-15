<template>
	<div>
		<v-row class="mt-1">
 			<v-col cols="12" xs="12" sm="12" md="8" lg="8" xl="8">
				<file-input 
		  			class="mt-3"
					:files="files" 
					v-on:file-change="setFiles"
					v-on:file-imagepreview="clearedPreview"
		            id="inputFile">
		        </file-input>
				<v-btn color="#4CAF50" @click="saveImages" x-small dark><v-icon>mdi-upload</v-icon>Upload Image</v-btn>
			</v-col>
			<v-col cols="12" xs="12" sm="12" md="4" lg="4" xl="4" >
 				<div>
 					<h4>Preview news changes</h4>
 					<p>
 						<b>Path New Image : </b>
 						<small>{{ listener.object.path }}</small>
 					</p>
 					<p>
 						<b>Files :</b>
 						<small>{{ files.length }}</small>
 					 </p>
 					
 				</div>
 			</v-col>
		</v-row>
	</div>
</template>

<script>
	import FileInput from './../../../global_components/FileInput'
	export default{
		props: {
			listener: Object,
			getDocuments: Function
		},
    	components: {
    		FileInput
    	},
    	data:() => ({
    		files: [],
    		imagePreview: [],   
    		formImg : new Form({
    			image: '',
    			path: ''
    		})
    	}),
    	computed:{
    	},
    	created(){
    		
    	},
		methods:{
			setFiles(files) {
                 const filesPreview = files

                 Object.keys(filesPreview).forEach(i => {
                      const file = filesPreview[i];
                      const reader = new FileReader();
                      reader.onload = (e) => {
                          this.imagePreview.push(reader.result);
                      }
                      this.imagePreview = []
                      reader.readAsDataURL(file);

                  });
                 
                 
                 if (files !== undefined) {
                     this.files = files

                     this.disableUploadButtonImage = false
                 }
          },
          	clearedPreview(){
               this.imagePreview = []
             
          	},
          	saveImages(){
          		
          		this.formImg.image = this.files
          		this.formImg.path = this.listener.object.path

          		if (this.formImg.image == '' && this.files.length == 0) {
          			alert('Set image to upload File')
          			return
          		}
          		if (this.formImg.path == '' ||  this.formImg.path == undefined) {
          			alert('Select folder to upload File')
          			return
          		}

          		this.formImg.post(this.$urlApp + this.$apiPath + 'media')
               .then(response => {
               		if(response.status == 200){
               			this.getDocuments()
               			this.files = []
               		}
				})
               .catch(e => {
                
               })
          	}
	    }
};
</script>
<style type="text/css">
	
</style>