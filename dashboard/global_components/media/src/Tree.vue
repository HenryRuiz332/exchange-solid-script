<template>
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
					shaped >
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
                            				position:absolute; 
                                        width:100%; 
                                        cursor:pointer; padding:0px 30px 0px 30px;">
                            	   <v-icon @click="treeClick(item)" >
		                            {{ files[item.format] + ' ' + item.name }}
		                        </v-icon> {{ item.name }}
                        </span>
                      
                        
				    </template>

				  </v-treeview>
				  	</div>
				  
 			</v-col>
 			<v-col cols="12" xs="12" sm="12" md="4" lg="4" xl="4" style="border-left: 1px solid #000" >
 				<div v-if="!isFolder && listener.module == 'tree'">
 					<img :src="listener.realPathImage" class="img-thumbnail" width="400" height="400">
 					<p>
 						<b>Image Name : </b>
 						<small>{{ listener.object.name }}</small>
 					</p>
 					<p>
 						<b>Image Url :</b>
 						<small><a :href="listener.realPathImage" target="_blank">{{ listener.realPathImage }}</a></small>
 					 </p>
 				</div>
 				<div v-else-if="isFolder && listener.module == 'tree'">
 					<p>
 						<b>Folder Name : </b>
 						<small>{{ listener.object.original }}</small>
 					</p>
 					<!-- <p>
 						<b>Images :</b>
 						<small><a :href="listener.realPathImage" target="_blank">{{ listener.realPathImage }}</a></small>
 					 </p> -->
 				</div>
 			</v-col>
 		</v-row>
	</div>
</template>
<script>
	
	
	export default{
		props:{
			tree: Array,
			selectionType: String,
			initiallyOpen: Array,
			items: Array,
			treeClick: Function,
			listener: Object,
			files: Object

		},
    	components: {
    		
    		
    	},
    	data:() => ({
    	
     
    	}),
    	computed:{
    		isFolder: function(){
            return this.listener.object.isFolder
         },
    	},
    	created(){
    		

    	},
		methods:{

	    }
};
</script>
<style type="text/css">
	
</style>