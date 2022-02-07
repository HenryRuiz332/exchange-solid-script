<template>
    <div>
        <div class="row my-5 ">
        	Vender Crypto

         	<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 offset-md-2">
				<div class="my-3 row">
					<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mr-auto">
						<select  class="form-control" v-model="formExchange.cryptoObject.crypto">
							<option v-for="crypto,i in cryptos" :key="i" >
								{{ crypto.crypto}}
							</option>
						</select>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<input 	type="number"
								class="form-control"
								size="5"
								width="5" 
								min="0" 
								v-model="formExchange.cryptoObject.quantity">$
					</div>
				</div>

				<div class="text-center"><i class="fa fa-arrow-down"></i></div>

				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<select  class="form-control" v-model="formExchange.bankAccount">
								<option v-for="BAccount,n in banksAccounts" :key="n" @change="changeAccount" :value="BAccount.id">
									{{ BAccount.type }} - {{ BAccount.bank.bank_name }}
								</option> 
						</select>
						<span v-if="objectAccounSelected != null">
							<!-- <small>Esta información solo la puede ver usted</small><br> -->
							<small style="color:#000000!important;">Datos asociados a {{ objectAccounSelected.type }} - {{ objectAccounSelected.bank.bank_name}}</small>:<br>
							<small style="color:#000000!important;">Documento: {{ objectAccounSelected.document }}</small><br>
							<small style="color:#000000!important;">Teléfono: {{ objectAccounSelected.phone }}</small>
						</span>
						
					</div>
				</div>
	          
         	</div>
        </div>
    </div>
</template>

<script>
    export default {
    	props: {
    		cryptos: Array,
    		banksAccounts: Array,
    		formExchange: Object
    	},
        data:() =>({
            
        }),
        computed:{
            objectAccounSelected(){
            	let bankAccount = null
            	for(var i =0; i<this.banksAccounts.length; i++){
            		if (this.formExchange.bankAccount == this.banksAccounts[i].id) {
            			bankAccount = this.banksAccounts[i]
            			break
            		}
            	}

            	return bankAccount
            }
        },
        mounted() {
            
        },
        methods:{
          	changeAccount(account){
          		console.log(account)
          	}
        }
    };
</script>
