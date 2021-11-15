<template>
    <div data-app>
          <Sidenav/>
          <!-- Main content -->
          <div class="main-content" id="panel">
            <!-- Topnav -->
            <Topnav/>
            <!-- Header -->
            <!-- Header -->
            
            <!-- Page content -->
            <router-view :token="token" :IDuser="IDuser"></router-view>
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
                }
          },
          mounted() {
            
          },
          methods:{
            
          }
    };
</script>
<style type="text/css">
    
</style>
