<template>
	<div>
		<v-row justify="center" style="z-index:10000">
    		<v-dialog
		      	v-model="dialog"
		      	fullscreen
		      	hide-overlay
		      	transition="dialog-bottom-transition">
     
		      	<v-card>
		        	<v-toolbar
		          		dark
		          		color="primary">
		          		<v-btn
		            		icon
		           			dark
		            		@click="closeDialogMedia">
		            			<v-icon>mdi-close</v-icon>
		          		</v-btn>
		          		<v-toolbar-title>Media</v-toolbar-title>
		          			<v-spacer></v-spacer>
					          		<v-toolbar-items>
					           <!--  <v-btn
					              dark
					              text
					              @click="dialog = false">
					              Save
					            </v-btn> -->
		          		</v-toolbar-items>
		        	</v-toolbar>
		        	<div justify="center">
		        		<ControlsMedia 
		        					:listener="listener" 
		     		 				:getDocuments="getDocuments"
		     		 				:deleteItem="deleteItem"
		     		 				:uploadFile="uploadFile"
		     		 				:newFolder="newFolder"
		     		 				:tree="tree"
		     		 				/>
			     		 
					    <UploadFile 
							  		v-if="listener.module == 'uploadFile'"
							  		:uploadFile="uploadFile"
							  		:listener="listener"
							  		:getDocuments="getDocuments"/>

						<NewFolder  
									v-if="listener.module == 'newFolder'" 
									:listener="listener"
									:treeClick="treeClick"
									:getDocuments="getDocuments"
									 />
						<div >
							<v-row class="mt-1" >
					 			<v-col cols="12" xs="12" sm="12" md="8" lg="8" xl="8">
					 				<div style="overflow-y: scroll!important; height:90vh;">
					 				<v-treeview
									    v-model="tree"
									    :selection-type="selectionType"
									   	:open="initiallyOpen"
									    :items="items"
									    activatable
									    item-key="name"
									    open-on-click
									    active-class="v-treeview-node--active"
										:active="tree"
										item-text=""
										rounded
										hoverable
										selectable
										shaped 
										return-object>
									    <template v-slot:prepend="{ item, open }"  @click="treeClick(item)" >
									    			<v-icon v-if="!item.format"  @click="treeClick(item)" >
					                            {{ open ? 'mdi-folder-open' : 'mdi-folder' }}
					                        </v-icon>
									      		<span
					                            v-if="!item.format"
					                            activatable 
					                            @click="treeClick(item)" 
					                            style="		">
					                            	 {{ item.name }}
					                        </span>
					                        <span
					                            v-else
					                            activatable 
					                            @click="treeClick(item)" 
					                            style="		
					                            			
					                                        width:100%; 
					                                        cursor:pointer; padding:0px 20px 0px 20px;">
					                            	   <v-icon @click="treeClick(item)" >
							                            {{ files[item.format] + ' ' + item.name }}
							                        </v-icon> {{ item.name }}
					                        </span>
					                      
					                        
									    </template>

									  </v-treeview>
									  	</div>
									  
					 			</v-col>
					 			<v-col cols="12" xs="12" sm="12" md="4" lg="4" xl="4" >
					 				<div v-if="!isFolder && listener.module == 'tree'">
					 					<v-img
								        :src="listener.realPathImage +`?image=${1 * 5 + 10}`"
								        
								        aspect-ratio="1"
								        class="grey lighten-2 img-thumbnail">
								        <template v-slot:placeholder>
								          <v-row
								            class="fill-height ma-0"
								            align="center"
								            justify="center">
								            <v-progress-circular
								              indeterminate
								              color="grey lighten-5"
								            ></v-progress-circular>
								          </v-row>
								        </template>
								      </v-img>
					 					<p>
					 						<b>Image Name : </b>
					 						<small>{{ listener.object.name }}</small>
					 					</p>
					 					<p>
					 						<b>Image Url :</b>
					 						<small >
					 							<a :href="listener.realPathImage" target="_blank">{{ listener.realPathImage }}</a>
					 							<input  :value="listener.realPathImage" id="inputPathImage" style="opacity:0">
					 							<br>
					 							<span class="copyLink ml-auto" @click.stop.prevent="copyOnClick">
									              Copy path image
									            </span>
					 						</small>
					 					 </p>
					 				</div>
					 				<div v-else-if="isFolder && listener.module == 'tree'">
					 					<p>
					 						<b>Folder Name : </b>
					 						<small>{{ listener.object.original }}</small>
					 					</p>
					 					
					 				</div>
					 			</v-col>
					 		</v-row>
						</div>
		        	</div>
		     		 	
		     		
		      </v-card>
		    </v-dialog>
		    
  		</v-row>
	</div>
</template>

<script>
	import ControlsMedia from './src/ControlsMedia.vue'
	import UploadFile from './src/UploadFile.vue'
	import Tree from './src/Tree.vue'
	import NewFolder from './src/NewFolder.vue'

	import {media} from './mixins/media.js'
	export default{
		mixins:[media],
    	components: {
    		ControlsMedia,
    		UploadFile,
    		Tree,
    		NewFolder,
    	},
    	props:{
    		upMed : Boolean,
    		dialog: Boolean,
    		token: String,
    		openDialogMediaImages: Function,
    		closeDialogMedia: Function
    	},
    	data:() => ({
    		
    		listener : {
    			object: '',
    			realPathImage: '',
    			module: 'tree'
    		},
    		 initiallyOpen: ['media'],
    		
      
      	
     
    	}),
    	computed:{
    		isFolder: function(){
	            return this.listener.object.isFolder
	         },
    	},
    	created(){
    		
    		let locationMedia = window.location.pathname
    		let pathname = '/dashboard-tecnocosmetic/media/' + this.token
    		if(locationMedia == pathname){
    			
    			this.openDialogMediaImages()
    		}
    		

    	},
		methods:{
			copyOnClick () {
          			let copyOn = document.querySelector('#inputPathImage')
		          	copyOn.setAttribute('type', 'text')    // 不是 hidden 才能複製
		          	copyOn.select()

		          try {
		            var successful = document.execCommand('copy');
		            var msg = successful ? 'successful' : 'unsuccessful';
		            // alert('Testing code was copied ' + msg);
		          } catch (err) {
		            alert('Oops, unable to copy');
		          }

		          /* unselect the range */
		          copyOn.setAttribute('type', 'hidden')
		          // window.getSelection().removeAllRanges()
		        },
	    }
};
</script>
<style type="text/css">
	.v-dialog__content{
		z-index: 10000!important;
	}


	.v-treeview-node__content{
		
			
       	width:100%; 
       	cursor:pointer; padding:0px 20px 0px 20px;
	}

	.copyLink{
		cursor: copy;
	}
</style>