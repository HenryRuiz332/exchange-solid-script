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
	                                           v-model="formUser.nombre"
	                                           label="Nombre"
	                                           :error-messages="errors.errors.nombre ? errors.errors.nombre[0] : null">
	                                                
	                                      </v-text-field>
                                 		</v-col>
	                                 	<v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
		                                 	<v-text-field
		                                 		dark
		                                        v-model="formUser.apellido_materno"
		                                        label="Apellido materno">
		                                        
		                                   	</v-text-field>
		                            	</v-col>
		                            	<v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
			                                 <v-text-field
			                                 	dark
			                                      v-model="formUser.apellido_paterno"
			                                      label="Apellido paterno">
			                                           
			                             </v-text-field>
			                            </v-col>
			                            
			                             <v-col
			                                cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
				                               <v-text-field
				                                 	dark
				                                      v-model="formUser.email"
				                                      label="Email"
				                                      :error-messages="errors.errors.email ? errors.errors.email[0] : null">
				                                           
				                              </v-text-field>
				                         </v-col>
			                            <v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
			                                      	<v-text-field
			                                      		dark
			                                           v-model="formUser.telefono"
			                                           label="Teléfono"
			                                           :counter="10"
			                                           :error-messages="errors.errors.telefono ? errors.errors.telefono[0] : null">
			                                                
			                                        </v-text-field>
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
                            @click="closeFormUser">
                                 Close Form
                       </v-btn> &nbsp;
                       <v-btn v-if="editMode == false"
                           	x-smal
                           	rounded
                           	dark
                            color="#9F7AF3"
                             @click="saveUser">
                                 Save
                       </v-btn>
                       <v-btn v-else
                           	x-smal
                           	rounded
                           	dark
                            	color="#9F7AF3"
                             	@click="updateUser">
                                 Update
                       </v-btn>
             </v-card-actions>
        </v-card>
	</div>
</template>
<script>
	

	export default{
		
    	props:{
    		closeFormUser: Function,
    		formTitle: String,
    		formUser: Object,
    		editMode: Boolean,
    		roles: Array,
    		status: Array,
    		users: Array,
    		getUsers: Function,
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
       	saveUser () {
       		this.formUser.busy = true;
           	this.formUser.post(this.$urlApp + this.$apiPath + 'users')
               .then(response => {
               	if (response.status == 200) {
               		this.getUsers()
               		this.closeFormUser()
               		this.$successbvToast('Nuevo cliente agregado! ') 
               	}
                  
             	})
             	.catch(e => {
                 	this.$errorbvToast()
             	})
       	},
       	

       	updateUser () {
       		
       		
           	this.formUser.post(this.$urlApp + this.$apiPath + 'users/' + this.formUser.id)
               .then(response => {
                  	if (response.status == 200) {
                  		localStorage.setItem('user', JSON.stringify(response.data.user))
					this.getUsers()
               		this.closeFormUser()
               		this.$successbvToast('cliente actualizado! ') 
                  	}
                  
             	})
             	.catch(e => {
                	this.$errorbvToast()
             	})
       	},


    }
};
</script>
