export const banks_accounts = {
     
     data(){
          return {
               banksAccounts: [],
               banks: [],
               formBankAccount : new Form({
                    id: '',
                    user_id : '',
                    bank_id : '',
                    name_user_account : '',
                    account_number : '',
                    document : '',
                    type : 'Transferencia Bancaria',
                   
               }),

               formBankAccountMovil : new Form({
                    id: '',
                    user_id : '',
                    bank_id : '',
                    document : '',
                    type : '',
                    phone : '',
               }),
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
          let param = 'Pago Móvil'
          this.getBanksAccounts(param)
     },
     methods:{
          getBanksAccounts(param){
               
               let getModule = 'banks-accounts/' + this.$attrs.token + '?page=' + this.pagination.current_page

               axios.get(this.$urlApp + this.$apiPath + getModule)
               .then(response => {
                    if (response.status == 200) {
                         this.banksAccounts = response.data.banksAccounts.data
                         this.banks = []
                         let bnks = response.data.banks
                         for(let x = 0; x <bnks.length; x++){
                              if(param == 'Pago Móvil'){
                                   this.banks.push({
                                        value: bnks[x].id,
                                        text: bnks[x].bank_name
                                   }) 
                              }

                              if(param == 'Transferencia Bancaria'){
                                   if (bnks[x].bank_name == 'BANESCO-BANCO-UNIVERSAL') {
                                        this.banks.push({
                                             value: bnks[x].id,
                                             text: bnks[x].bank_name
                                        })  
                                   }

                                   if (bnks[x].bank_name == 'BANCO-PROVINCIAL-BBVA') {
                                        this.banks.push({
                                             value: bnks[x].id,
                                             text: bnks[x].bank_name
                                        })  
                                   }

                               }      
                         }


                         this.pagination = response.data.banksAccounts
                            
                    }
                  
               })
               .catch(e => {
                  
               })
              
          },

          saveBankAccount() {
               this.formBankAccount.busy = true;
               this.formBankAccount.post(this.$urlApp + this.$apiPath + 'banks-accounts/' + this.$attrs.token)
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
