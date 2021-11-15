<template>
	<div>
		<v-card color="#1D203F" class="text-white formUser">
            <v-card-title>
                <span class="headline">{{ formTitle }}</span>
            </v-card-title>
          
             <v-card-text >
                  <v-container>
                       <v-row>
                            <v-col cols="12" xs="12" sm="6" md="6" lg="6" xl="6">
                                 	<v-row>
                                 	
                                 		<v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
                                 			<v-text-field
                                 				dark
	                                           v-model="formVisitors.calle"
	                                           label="calle"
	                                           :error-messages="errors.errors.calle ? errors.errors.calle[0] : null">
	                                                
	                                      </v-text-field>
                                 		</v-col>
	                                 	<v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
		                                 	<v-text-field
		                                 		dark
		                                        v-model="formVisitors.num_ext"
		                                        label="num_ext"
		                                        :error-messages="errors.errors.colonia ? errors.errors.colonia[0] : null">
		                                         
		                                   	</v-text-field>
		                            	</v-col>
		                            	<v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
			                                 <v-text-field
			                                 	dark
			                                      v-model="formVisitors.num_int"
			                                      label="num_int">
			                                           
			                             </v-text-field>
			                            </v-col>
			                            
			                             <v-col
			                                cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
				                               <v-text-field
				                                 	dark
				                                      v-model="formVisitors.colonia"
				                                      label="colonia"
				                                      :error-messages="errors.errors.colonia ? errors.errors.colonia[0] : null">
				                                           
				                              </v-text-field>
				                         </v-col>
			                            <v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
			                                      	<v-text-field
			                                      		dark
			                                           v-model="formVisitors.estado"
			                                           label="estado"
			                                           
			                                           :error-messages="errors.errors.estado ? errors.errors.estado[0] : null">
			                                                
			                                        </v-text-field>
			                            </v-col>
			                             <v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
			                                      	<v-text-field
			                                      		dark
			                                           v-model="formVisitors.pais"
			                                           label="pais"
			                                           
			                                           :error-messages="errors.errors.pais ? errors.errors.pais[0] : null">
			                                                
			                                        </v-text-field>
			                            </v-col>

			                            <v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
			                                      	<v-select
			                                      		dark
			                                      		:items="clientes"
			                                      		item-text="nombre"
			                                      		item-value="id"
			                                           v-model="formVisitors.cliente_id"
			                                           label="cliente"
			                                           
			                                           :error-messages="errors.errors.cliente_id ? errors.errors.cliente_id[0] : null">
			                                                
			                                        </v-select>
			                            </v-col>


			                           
                                 	</v-row>
                                      
                            </v-col>

                       </v-row>
                     
                  </v-container>
             </v-card-text>

             <v-card-actions>
                  <v-spacer></v-spacer>
                       <v-btn
                           	x-smal
                           	rounded
                           	dark
                            color="#F44336"
                            @click="closeVisitors">
                                 Close Form
                       </v-btn> &nbsp;
                       <v-btn v-if="editMode == false"
                           	x-smal
                           	rounded
                           	dark
                            color="#9F7AF3"
                             @click="saveD">
                                 Save
                       </v-btn>
                       <v-btn v-else
                           	x-smal
                           	rounded
                           	dark
                            	color="#9F7AF3"
                             	@click="updateD">
                                 Update
                       </v-btn>
             </v-card-actions>
        </v-card>
	</div>
</template>
<script>
	

	export default{
		
    	props:{
    		closeVisitors: Function,
    		formTitle: String,
    		formVisitors: Object,
    		editMode: Boolean,
    		clientes: Array,
    		getVisitors: Function,
    		responseOk: Boolean,
    		
    		
    	},
    
    	data:() => ({
    		menu: false,
    		multipleFile: false,
    	}),
    	
    	computed:{
        	storageCountries(){
        		return JSON.parse(localStorage.countries)
        	},
        	errors() {
                return this.$store.getters.geterrors
            }

    	},
    	mounted(){

    	},
	methods:{
       	saveD () {
       		this.formVisitors.busy = true;
           	this.formVisitors.post(this.$urlApp + this.$apiPath + 'direcciones')
               .then(response => {
               	if (response.status == 200) {
               		this.getVisitors()
               		this.closeVisitors()
               		this.$successbvToast('Nuevo cliente agregado! ') 
               	}
                  
             	})
             	.catch(e => {
                 	
             	})
       	},
       	

       	updateD () {
       		
       		
           	this.formVisitors.put(this.$urlApp + this.$apiPath + 'direcciones/' + this.formVisitors.id)
               .then(response => {
                  	if (response.status == 200) {
                  		localStorage.setItem('user', JSON.stringify(response.data.user))
					this.getVisitors()
               		this.closeVisitors()
               		this.$successbvToast('cliente actualizado! ') 
                  	}
                  
             	})
             	.catch(e => {
                	
             	})
       	},


    }
};
</script>
