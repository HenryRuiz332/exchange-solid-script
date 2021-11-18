export const cryptocurriencies = {
     props:{
          nameModule: String,
          token: String,
     },
     data(){
          return {
               getModule: '',
               tableCryptocurriencies: [],
               dialogForm: false,
               dialogDelete: false,
               editIndexObj: -1,
               editMode: false,
               cryptocurriencies:[],
               trashAll : '',

               formCryptocurriencies: new Form({
                    id: '',
                    crypto: '',
                    svg: '',
                    status: '',
                    
               }),
              
               selectDel :[],
          }
     },
     computed: {
          formTitle () {
               return this.editIndexObj === -1 ? 'New Cryptocurriencies' : 'Edit Cryptocurriencies'
          },
          titleCrud(){
               this.title = this.nameModule
               return this.title
          },
          errors() {
               return this.$store.getters.geterrors
          }
     },
     mounted(){
          this.getModule = 'exchange/cryptocurriencies/' + this.token
          this.getCryptocurriencies()
     },
     methods:{
          getCryptocurriencies(){
              
               axios.get(this.$urlApp + this.$apiPath + this.getModule )
               .then(response => {
                    if (response.status == 200) {
                       this.cryptocurriencies = response.data.crypto
                        
                    }else{
                         this.$errorbvToast('Error 500')
                    }
               })
               .catch(e => {
                   this.$errorbvToast('Error 500')
               })
          },
          openDialog(){
               this.dialogForm = true
          },
          saveCryptocurriencies () {
               this.formCryptocurriencies.busy = true;
               this.formCryptocurriencies.post(this.$urlApp + this.$apiPath + this.getModule)
               .then(response => {
                     if (response.status == 200) {
                         this.closeFormCryptocurriencies()
                         this.$successbvToast('Commissions add successfully! ') 
                    }else{
                         this.$errorbvToast('Error 500')
                    }
                  
                 })
                 .catch(e => {
                       
                       this.$errorbvToast(this.errors.message)
                 })
          },
          // editUser (item) {

          //      this.editMode = true
          //      this.formUser.reset()
          //      this.formUser.clear()
          //      this.formUser.fill(item)
          //      this.editedIndex = this.users.indexOf(item)
          //      this.dialogForm = true

               
              
          // },
          openDialogDelete(){
               this.selectDel = []
               if ( this.tableCryptocurriencies.length > 0) {
                    this.selectDel = this.tableCryptocurriencies
               }
               this.dialogDelete = true
          },
          deleteObj (item) {
               this.selectDel = []
               this.selectDel.push(item)
               this.dialogDelete = true
          },
          closeDelete () {
               if ( this.tableCryptocurriencies.length > 0) {
                    this.selectDel = this.tableCryptocurriencies
               }
               this.dialogDelete = false
               this.selectDel = []
               
          },
          deleteItemConfirm () {
               axios.post(this.$urlApp + this.$apiPath + 'exchange/cryptocurriencies-deletes/' + this.token, {
                    'deletes' : this.selectDel
               })
               .then(response => {
                    if (response.status == 200) {
                         this.getCryptocurriencies()
                         this.closeDelete()
                         this.$deletebvToast('Item Delete')
                    }else{
                         this.$errorbvToast('Error 500')
                    }
               })
               .catch(e => {
                   this.$errorbvToast(this.errors.message)
               })

          },

          
          closeFormCryptocurriencies() {

               this.dialogForm = false
               this.formCryptocurriencies.roles= []
               this.formCryptocurriencies.reset()
               this.formCryptocurriencies.clear()
               this.editMode = false


               this.getCryptocurriencies()
          },

          


          
     },
       
}
