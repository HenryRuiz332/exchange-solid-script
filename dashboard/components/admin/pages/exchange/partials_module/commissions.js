export const commissions = {
     props:{
          nameModule: String,
          token: String,
     },
     data(){
          return {
               getModule: '',
               tableCommissions: [],
               dialogForm: false,
               dialogDelete: false,
               editIndexObj: -1,
               editMode: false,
               commissions:[],
               trashAll : '',

               formCommissions: new Form({
                    id: '',
                    dolar: 0,
                    percentage: 0,
                    status: false,
                    
               }),
              
               selectDel :[],
          }
     },
     computed: {
          formTitle () {
               return this.editIndexObj === -1 ? 'New commission' : 'Edit commission'
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
          this.getModule = 'exchange/commissions/' + this.token
          this.getCommissions()
     },
     methods:{
          getCommissions(){
              
               axios.get(this.$urlApp + this.$apiPath + this.getModule )
               .then(response => {
                    if (response.status == 200) {
                       this.commissions = response.data.commissions
                        
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
          saveCommissions () {
               this.formCommissions.busy = true;
               this.formCommissions.post(this.$urlApp + this.$apiPath + this.getModule)
               .then(response => {
                     if (response.status == 200) {
                         this.closeFormCommissions()
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
               if ( this.tableCommissions.length > 0) {
                    this.selectDel = this.tableCommissions
               }
               this.dialogDelete = true
          },
          deleteObj (item) {
               this.selectDel = []
               this.selectDel.push(item)
               this.dialogDelete = true
          },
          closeDelete () {
               if ( this.tableCommissions.length > 0) {
                    this.selectDel = this.tableCommissions
               }
               this.dialogDelete = false
               this.selectDel = []
               
          },
          deleteItemConfirm () {
               axios.post(this.$urlApp + this.$apiPath + 'exchange/commissions-deletes/' + this.token, {
                    'deletes' : this.selectDel
               })
               .then(response => {
                    if (response.status == 200) {
                         this.getCommissions()
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

          
          closeFormCommissions() {

               this.dialogForm = false
               this.formCommissions.roles= []
               this.formCommissions.reset()
               this.formCommissions.clear()
               this.editMode = false


               this.getCommissions()
          },

          


          
     },
       
}
