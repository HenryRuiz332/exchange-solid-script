<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <h4>Join Our Newsletter {{ appName }}</h4>
                 <p>To get the latest tips on hair technology.</p>
                 <form  @submit.prevent="joinNewsleeter">
                      <input type="email" v-model="form.email" style="border:1px solid #000; border-radius: 19px">
                      <button type="submit" class="btn btn-success" :disabled="disabled">Join</button>
                 </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:() =>({
            form:{
                email:''
            },
            disabled: false
        }),
        computed:{
            appName(){
                return localStorage.app_name
            }
        },
        mounted() {
            
        },
        methods:{
            joinNewsleeter(){
                if (this.form.email == '') {
                    return
                }
                this.disabled = true
                axios.post('get/v1/newsletter',{
                    'email' : this.form.email
                }).then(res => {
                  if (res.data.status == 110) {
                        this.form.email = ''
                        alert('Joined successfully')
                        this.disabled = false
                  }
                  
              }, res => {
                   this.disabled = false
              })
            }
        }
    }
</script>
