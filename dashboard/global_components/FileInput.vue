<template>
  <!-- accept=".svg" -->
  <div >
          <div class="input-group">
               <input :value="getFilesName()" class="form-control" type="text"  placeholder="Set Image" readonly >
               <span class="input-group-btn">

                    <button v-if="files.length" class="btn btn-danger" type="button"  @click="clearFiles">
                         <i class="fa fa-ban"></i>
                    </button>
                    <button class="btn btn-primary" type="button" @click="showFilePicker">
                         <i class="fa fa-paperclip"></i>
                    </button>
               </span>
          
          </div>
          <input accept=".svg, .jpg, .jpeg, .png" type="file" ref="file" style="display: none;" @change="onChange" multiple>
          <small style="color:#E57373" >Maximun size file 1MB</small>

    </div>

</template>


<script >
  export default{
     props: ['files','multipleFile'],
     data:() => ({
          showPreview: '',
          
    
     }),
     mounted(){
       
     },
     methods:{
          showFilePicker(){
               this.$refs.file.click()
          },
     onChange(e){
          const filesPreview = e.currentTarget.files;
          
          for(let h = 0; h<filesPreview.length; h++){
               if(filesPreview[h].size<=1000000){
                    Object.keys(filesPreview).forEach(i => {
                         const file = filesPreview[i];
                         const reader = new FileReader();
                         reader.readAsDataURL(file);
                         return
                     });
                   
               }else{
                    alert('Maximun size file unsoported')
                    return
               }     
        }

          // this.files = e.target.files[0] //subir una
          let files = e.target.files //subir varias
          this.$emit('file-change', files)
         

     },

     getFilesName (){
          let filesName = []

          if (this.files.length > 0) {
               for (let file of this.files) {
               filesName.push(file.name)
               }
          }

        return filesName.join(", ")

     },
     clearFiles(){
          var input = document.getElementById("inputFile")
          input.children[0].type = 'text'
          input.children[0].type = "file"

          const files = []
          this.$emit('file-change', files)
          this.$emit('file-imagepreview')

           
      },



      
    }
  }
</script>