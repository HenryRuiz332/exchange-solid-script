export const users = {
     
     data(){
          return {
               roles: [],
               status: [],
               tableUser: [],
               dialogForm: false,
               dialogDelete: false,
               editIndexObj: -1,
               editMode: false,
               users:[],
               trashAll : '',


               formUser: new Form({
                    id: '',
                    nombre :'',
                    apellido_materno :'',
                    apellido_paterno :'',
                    email :'',
                    telefono :'',
                    
               }),
              
               selectDel :[],


             

          }
     },
     computed: {
          formTitle () {
               return this.editIndexObj === -1 ? 'Nuevo Cliente' : 'Editar Cliente'
          },
          titleCrud(){
               this.title = this.nameModule
               return this.title
          },
     },
     mounted(){
          this.getUsers()
     },
     methods:{
          getUsers(){
               let getModule = 'users'
               axios.get(this.$urlApp + this.$apiPath +  getModule).then(res => {
                    this.users = res.data.users.data
                  
                   
               }, res => {
                    
               })
          },
          openDialog(){
               this.dialogForm = true
          },
          editUser (item) {

               this.editMode = true
               this.formUser.reset()
               this.formUser.clear()
               this.formUser.fill(item)
               this.editedIndex = this.users.indexOf(item)
               this.dialogForm = true

               
              
          },
          openDialogDelete(){
               this.selectDel = []
               if ( this.tableUser.length > 0) {
                    this.selectDel = this.tableUser
               }
               this.dialogDelete = true
          },
          deleteObj (item) {
               this.selectDel = []
               this.selectDel.push(item)
               this.dialogDelete = true
          },
          closeDelete () {
               if ( this.tableUser.length > 0) {
                    this.selectDel = this.tableUser
               }
               this.dialogDelete = false
               this.selectDel = []
               
          },
          deleteItemConfirm () {
               axios.post(this.$urlApp + this.$apiPath + 'users-delete', {
                    'deletes' : this.selectDel
               })
               .then(response => {
                    if (response.status == 200) {
                         this.getUsers()
                         this.closeDelete()
                         this.$deletebvToast()
                    }else{
                         this.$errorbvToast()
                    }
               })
               .catch(e => {
                   this.$errorbvToast()
               })

          },

          
          closeFormUser() {

               this.dialogForm = false
               this.formUser.roles= []
               this.formUser.reset()
               this.formUser.clear()
               this.editMode = false


             
              
               this.getUsers()
          },

          


          
     },
       
}
