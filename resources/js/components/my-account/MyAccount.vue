<template>
    <div data-app>

         <!--  <preload v-if="isloading"></preload> -->

          <Sidenav/>
          <!-- Main content -->
          <div class="main-content" id="panel">
            <!-- Topnav -->
            <Topnav :token="token" :name="name"  />
            <!-- Header -->
            <!-- Header -->
            
            <!-- Page content -->
            
            <router-view 
               :isloading="isloading" 
               :token="token" 
               :IDuser="IDuser"
               ></router-view>
          </div>
    </div>
</template>

<script>
    import Sidenav from './structure/Sidenav'
    import Topnav from './structure/Topnav'
    export default {
          components:{
               Sidenav,
               Topnav
          },
          data:() =>({
           
          }),
          computed:{
               token(){
                    return localStorage.session_app
               },
               IDuser(){
                    return localStorage.ID
               },
               isloading: function() {
                    return this.$store.getters.getloading
               },
               name(){
                    return localStorage.name
               }
          },
          mounted() {
               this.user()
          },
          methods:{
               user(){
                    axios.get('get/user', {
                      params: {
                        key: 'value',
                      },
                    }).then((response) => {
                         localStorage.setItem('name', response.data.name)
                    }).catch((error) => {
                      console.error(error);
                    }).finally(() => {
                      
                    });
               }
          }
    };
</script>
<style type="text/css">
    
</style>
