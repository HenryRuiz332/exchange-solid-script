export const media = {
     data(){
          return {
               library : [],
               files: {
                    html: 'mdi-language-html5',
                    HTML: 'mdi-language-html5',
                    js: 'mdi-nodejs',
                    json: 'mdi-code-json',
                    md: 'mdi-language-markdown',
                    pdf: 'mdi-file-pdf',
                    PDF: 'mdi-file-pdf',
                    png: 'mdi-file-image',
                    PNG: 'mdi-file-image',
                    jpg: 'mdi-file-image',
                    JPG:  'mdi-file-image',
                    jpeg: 'mdi-file-image',
                    JPEG: 'mdi-file-image',
                    txt: 'mdi-file-document-outline',
                    TXT: 'mdi-file-document-outline',
                    xls: 'mdi-file-excel',
                    XLS: 'mdi-file-excel',
                    xlsx: 'mdi-file-excel',
                    XLSX: 'mdi-file-excel',
                    doc:  'mdi-file-word',
                    DOC:  'mdi-file-word',
                    docx: 'mdi-file-word',
                    DOCX: 'mdi-file-word',
                    pptx: 'mdi-file-powerpoint',
                    PPT: 'mdi-file-powerpoint',
                    PPTX: 'mdi-file-powerpoint',
                    ppt: 'mdi-file-powerpoint',
                    text: 'mdi-clipboard-text',
                    XML: 'mdi-clipboard-text',
                    xml: 'mdi-clipboard-text',
                    xmls: 'mdi-clipboard-text',
                    XMLS: 'mdi-clipboard-text',
                    json: 'mdi-clipboard-text',
                    epub: 'mdi-clipboard-text',
                    EPUB: 'mdi-clipboard-text',
                    EBOOK: 'mdi-clipboard-text',
                    ebook: 'mdi-clipboard-text',
                    awz: 'mdi-clipboard-text',
                    webp: 'mdi-file-image',
                    WEBP: 'mdi-file-image',
                    SVG: 'mdi-svg',
                    svg: 'mdi-svg',
                    GIF: 'mdi-play',
                    gif: 'mdi-play',
                    csv: 'mdi-clipboard-text',
                    CSV: 'mdi-clipboard-text',
                    ZIP: 'mdi-zip-box',
                    zip: 'mdi-zip-box',
                    gz: 'mdi-zip-box',
                    GZ: 'mdi-zip-box',
                    RAR: 'mdi-zip-box',
                    rar: 'mdi-zip-box',
                    tar: 'mdi-zip-box',
                    TAR: 'mdi-zip-box',
               },
               tree: [],
               selectionType : 'independent', //leaf
               initiallyOpen: ['media'],
               items: [
                    {
                         name:'',
                         format: '',
                         path: '',
                    }
               ],

               
          }    
     },
     mounted(){
         
          this.getDocuments()
          
     },
     computed: {
         
          
          
         
     },
     methods:{
          uploadFile(){
               this.listener.module = 'uploadFile'
          },
          newFolder(){
               this.listener.module = 'newFolder'
          },
          getDocuments(){
               this.listener =  {
                    object: {},
                    realPathImage: '',
                    module: 'tree'
               }
              
               axios.get(this.$urlApp + this.$apiPath + 'media')
               .then(response => {
                    if(response.status == 200){
                         this.items = []
                         this.library = response.data.allScan
                        
                         for(var b = 0; b<this.library.length; b++){
                              if(this.library[b].parentPholder == 'user_'+response.data.user.id){
                                   //it's root folders user
                                   this.items.push({
                                        idtoken : Math.random().toString(36).substring(7),
                                        name:this.library[b].folderName,
                                        format: null,
                                        path: this.library[b].path,
                                        children:[],
                                        parentPholder: this.library[b].parentPholder,
                                        original:  this.library[b].originalFolder,
                                        isFolder : true,
                                        selected : false,
                                        userId : response.data.user.id
                                   })
                              }

                              for(var c =0; c<this.items.length; c++){
                                   if(this.items[c].name == this.library[b].parentPholder){
                                       this.items[c].children.push({
                                             idtoken : Math.random().toString(36).substring(7),
                                             name:this.library[b].folderName,
                                             format: null,
                                             path: this.library[b].path,
                                             children:[],
                                             parentPholder: this.library[b].parentPholder,
                                             original:  this.library[b].originalFolder,
                                             isFolder : true,
                                             selected : false,
                                             userId : response.data.user.id
                                        }) 
                                   }
                              }

                         }

                         for(var z = 0; z<this.items.length; z++){
                              for (var y = 0; y < this.library.length; y++) {
                                   for (var x = 0; x < this.library[y].files.length; x++) {
                                        var splitPoint = this.library[y].files[x].split('.')
                                        var file = ''
                                        file = splitPoint[0] + '.' + splitPoint[1]

                                        if(this.library[y].folderName == this.items[z].name){
                                              this.items[z].children.push({
                                                  idtoken : Math.random().toString(36).substring(7),
                                                  name: file,
                                                  format: splitPoint[1],
                                                  path: this.library[y].path,
                                                  children: [],
                                                  parentPholder: this.library[y].parentPholder,
                                                  original:  this.library[y].originalFolder,
                                                  isFolder : false,
                                                  selected : false,
                                                  userId : response.data.user.id
                                              })
                                        }
                                         
                                   }
                              }
                         }

                         for (var k = 0; k < this.items.length; k++) {
                             for (var v = 0; v <  this.items[k].children.length; v++) {
                                for (var m = 0; m < this.library.length; m++) {
                                     for (var b = 0; b < this.library[m].files.length; b++) {
                                         var splitPiso = this.library[m].files[b].split('_')
                                         var format = this.library[m].files[b].split('.')
                                         var file = ''
                                        file = splitPiso[0] + '.' + format[1]
                                         if(this.items[k].children[v].name == this.library[m].folderName  &&
                                             this.library[m].path == this.items[k].children[v].path ){

                                             this.items[k].children[v].children.push({
                                                 idtoken : Math.random().toString(36).substring(7),
                                                 name: this.library[m].files[b],
                                                 parentPholder: this.library[m].parentPholder,
                                                 newName: file,
                                                 children: [],
                                                 path: this.library[m].path,
                                                 original:  this.library[m].carpetaOriginal,
                                                 format: format[1],
                                                 isFolder : false,
                                                 select : false
                                             })
                                         }
                                     }
                                 }
                             }
                         }

                        
                         console.log(this.items)
                        
                    }
                    
               })
               .catch(e => {
                
               })
          },

          deleteItem(){

               let form =  new Form({
                    'userId':  this.listener.object.userId,
                    'tree' : JSON.stringify(this.tree)
               })

               axios.post(this.$urlApp + this.$apiPath + 'media-delete', form)
               .then(response => {
                    console.log(response)
                    this.getDocuments()
               })
               .catch(e => {
                
               })
          },
          treeClick(item){
               this.listener.object = ''
               this.listener.object = item
               this.listener.realPathImage = ''

               let splitPathDecode = item.path.split('/')
          
               let obtainPath = ''
               for (let i = 0; i < splitPathDecode.length; i++) {
                    if(splitPathDecode[i] == 'storage'){
                         for (let n = i; n < splitPathDecode.length; n++) {
                              if(splitPathDecode[n] == 'app' || splitPathDecode[n] == 'public'){
                           
                              }else{
                                   obtainPath = obtainPath + splitPathDecode[n] + '/'
                              }
                         }
                    }
               }

               this.listener.realPathImage = window.location.origin +'/'+obtainPath + item.name
               console.log(this.listener)
          }
          
     }
     
}
