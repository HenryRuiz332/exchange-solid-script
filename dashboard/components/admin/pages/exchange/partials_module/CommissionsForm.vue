<template>
	<div>
		<v-card color="#1D203F" class="text-white formCommissions">
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
	                                           v-model="formCommissions.dolar"
	                                           label="Dolar %"
	                                           :error-messages="errors.errors.dolar ? errors.errors.dolar[0] : null">
	                                                
	                                      </v-text-field>
                                 		</v-col>
	                                 	<v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
		                                 	<v-text-field
		                                 		dark
		                                        v-model="formCommissions.percentage"
		                                        label="Percentage %">
		                                        
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
                            @click="closeFormCommissions">
                                 Close Form
                       </v-btn> &nbsp;
                       <v-btn v-if="editMode == false"
                           	x-smal
                           	rounded
                           	dark
                            color="#9F7AF3"
                             @click="saveCommissions">
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
    		closeFormCommissions: Function,
    		formTitle: String,
    		formCommissions: Object,
    		editMode: Boolean,
    		commissions: Array,
    		getCommissions: Function,
    		saveCommissions: Function,
    		errors: Object,
    	},
    
    	data:() => ({
    		menu: false,
    		multipleFile: false,
    	}),
    	
    	computed:{
        	storageCountries(){
        		return JSON.parse(localStorage.countries)
        	},
    	},
    	mounted(){

    	},
	methods:{
     
       	

     //   	updateUser () {
       		
       		
     //       	this.formCommissions.post(this.$urlApp + this.$apiPath + 'users/' + this.formCommissions.id)
     //           .then(response => {
     //              	if (response.status == 200) {
     //              		localStorage.setItem('user', JSON.stringify(response.data.user))
					// this.getCommissions()
     //           		this.closeFormCommissions()
     //           		this.$successbvToast('cliente actualizado! ') 
     //              	}
                  
     //         	})
     //         	.catch(e => {
     //            	this.$errorbvToast()
     //         	})
     //   	},


    }
};
</script>
