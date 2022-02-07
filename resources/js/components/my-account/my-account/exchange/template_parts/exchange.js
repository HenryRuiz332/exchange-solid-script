export const exchange = {
     
     data(){
          return {
               user: {},
               commission : {},
               cryptos: [],
               banksAccounts: [],
               
               formExchange :{
                    cryptoObject: {
                         crypto: '',
                         quantity: 0
                    },
                    bankAccount: ''
               },



               showDelete: false,
              

               
               status: [],
               tableUser: [],
              
               dialogDelete: false,
               editIndexObj: -1,
               editMode: false,
               users:[],
               trashAll : '',

               selectDel :[],
               pagination: {
                   current_page:1,

               },

               tb: ''

          }
     },
     computed: {
          
          
     },
     mounted(){
         
          this.getRequestForExchange()
          this.apiCallExchange()
     },
     methods:{
          getRequestForExchange(){
               
               let getModule = 'exchange/' + this.$attrs.token

               axios.get(this.$urlApp + this.$apiPath + getModule)
               .then(response => {
                  
                    this.user = response.data.user
                    this.commission = response.data.commission
                    this.cryptos = response.data.cryptos
                    this.banksAccounts = response.data.banksAccounts

                    // let cryptosArray = response.data.cryptos

                    // for (var i = 0; i < cryptosArray.length; i++) {
                    //      this.cryptos.push({
                    //           id: cryptosArray[i].id,
                    //           text: cryptosArray[i].crypto,
                    //           value: cryptosArray[i].id,
                    //           html: '<b>Item</b> 3',
                    //           label: 'Grouped options',
                    //      })    
                    // }


                    // let banksAccounts = response.data.banksAccounts

                    // for (var n = 0; n < banksAccounts.length; n++) {
                    //      this.banksAccounts.push({
                    //           id: banksAccounts[n].id,
                    //           text: banksAccounts[n].type,
                    //           value: banksAccounts[n].id,
                    //      })    
                    // }

               })
               .catch(e => {
                  
               })
              
          },


          apiCallExchange() {
              
               axios.post(this.$urlApp + this.$apiPath + 'exchange/api-call/' + this.$attrs.token)
               .then(response => {
                    console.log(response)
                    if (response.status == 200) {
                         
                    }
                  
               })
               .catch(e => {
                    this.$errorbvToast()
               })
          },

          saveBankAccountMovil() {
               this.formBankAccountMovil.busy = true;
               this.formBankAccountMovil.post(this.$urlApp + this.$apiPath + 'banks-accounts-m/' + this.$attrs.token)
               .then(response => {
                    if (response.status == 200) {
                         this.$successbvToast('¡Cuenta agregada!')
                         this.cleanFormBankAccount()
                         this.getBanksAccounts()
                    }
                  
               })
               .catch(e => {
                    this.$errorbvToast()
               })
          },

          editFormBankAccount (item) {
               

               if(item.type=='Transferencia Bancaria'){
                    this.editMode = true
                    this.formBankAccount.reset()
                    this.formBankAccount.clear()
                    this.formBankAccount.fill(item)
               }else{
                    this.editMode = true
                    this.formBankAccountMovil.reset()
                    this.formBankAccountMovil.clear()
                    this.formBankAccountMovil.fill(item)
               }
              
              
          },
         updateBankAccount() {

               this.formBankAccount.put(this.$urlApp + this.$apiPath + 'banks-accounts/' + this.formBankAccount.id + '/' + this.$attrs.token)
               .then(response => {
                    if (response.status == 200) {
                         this.$successbvToast('¡Datos actualizados! ') 
                         this.formPassword.reset()
                         this.formPassword.clear()
                    }
                  
               })
               .catch(e => {
                     
                    this.$errorbvToast()
               })
          },
         


          deleteObj (item) {
               this.deleteItemConfirm(item)
               this.$bvModal.hide('modal-'+ item.id)
          },
          
          deleteItemConfirm (item) {
               let s = item
               
               axios.delete(this.$urlApp + this.$apiPath + 'banks-accounts/' + item.id + '/' + this.$attrs.token)
               .then(response => {
                    if (response.status == 200) {
                         this.getBanksAccounts()
                         this.$deletebvToast('Item Eliminado ' + s.bank.bank_name)
                         
                    }else{
                         this.$errorbvToast('Ocurrio un error')
                    }
               })
               .catch(e => {
                   this.$errorbvToast('Ocurrio un error')
               }) 
               

          },

          
          cleanFormBankAccount() {
               this.formBankAccount.reset()
               this.formBankAccount.clear()

               this.formBankAccountMovil.reset()
               this.formBankAccountMovil.clear()
          },

         
          


          
     },
       
}
