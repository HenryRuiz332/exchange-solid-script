export const direcciones = {
     
     data(){
          return {
              
               tableVisitors: [],
               dialogFormD: false,
               dialogDelete: false,
               editIndexObj: -1,
               editMode: false,
               direcciones:[],
               countVisitors: '',
               trashAll : '',


               formVisitors: new Form({
                    id: '',
                     calle :'',
                    num_ext :'',
                    num_int :'',
                    colonia :'',
                    estado :'',
                    pais :'',
                    cliente_id :'',
                   
                    
               }),
               clientes: [],
                selectDel :[],


              
                pagination: {
                      current_page:1,

                  },
          }
     },
     computed: {
          formTitle () {
               return this.editIndexObj === -1 ? 'Nueva Direccion' : 'Editar Direccion'
          },
          titleCrud(){
               this.title = this.nameModule
               return this.title
          },
     },
     mounted(){
          this.getVisitors()
     },
     methods:{
          getVisitors(){
               let getModule = 'direcciones?page=' + this.pagination.current_page
               axios.get(this.$urlApp + this.$apiPath +  getModule).then(res => {
                    this.direcciones = res.data.direcciones.data
                    this.clientes = res.data.clientes

                    this.direcciones.forEach(element => {
                         element.created_at = new Date(element.created_at).toISOString().substr(0, 10)
                    });

                    this.countVisitors = res.data.countVisitors
                    this.pagination = res.data.direcciones
                   
               }, res => {
                    
               })
          },
          openDialog(){
               this.dialogFormD = true
          },
          editDireccion (item) {

               this.editMode = true
               this.formVisitors.reset()
               this.formVisitors.clear()
               this.formVisitors.fill(item)

               this.editedIndex = this.direcciones.indexOf(item)
               this.dialogFormD = true
          },
          openDialogDelete(){
               this.selectDel = []
               if ( this.tableVisitors.length > 0) {
                    this.selectDel = this.tableVisitors
               }
               this.dialogDelete = true
          },
          deleteObj (item) {
               this.selectDel = []
               this.selectDel.push(item)
               this.dialogDelete = true
          },
          closeDelete () {
               if ( this.tableVisitors.length > 0) {
                    this.selectDel = this.tableVisitors
               }
               this.dialogDelete = false
               this.selectDel = []
               
          },
          deleteItemConfirm () {
               axios.post(this.$urlApp + this.$apiPath + 'direcciones-delete', {
                    'deletes' : this.selectDel
               })
               .then(response => {
                    if (response.status == 200) {
                         this.getVisitors()
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

          
          closeVisitors() {

               this.dialogFormD = false
               this.formUser.roles= []
               this.formUser.reset()
               this.formUser.clear()
               this.editMode = false


               this.imagePreview = []
               this.files = []

               var input = document.getElementById("inputFile")
               input.children[0].type = 'text'
               input.children[0].type = "file"
               this.getVisitors()
          },

          


          
     },
       
}
