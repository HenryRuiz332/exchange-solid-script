<template>
    <div data-app>

         <!--  <preload v-if="isloading"></preload> -->

          <Sidenav/>
          <!-- Main content -->
          <div class="main-content" id="panel">
            <!-- Topnav -->
            <Topnav :token="token"/>
            <!-- Header -->
            <!-- Header -->
            
            <!-- Page content -->
            
            <router-view :isloading="isloading" :token="token" :IDuser="IDuser"></router-view>
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
          },
          mounted() {
            
          },
          methods:{
            
          }
    };
</script>
<style type="text/css">
    
</style>
