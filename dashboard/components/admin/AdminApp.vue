<template>
    

	<div data-app>
		 <!-- loader Start -->
         <preloader-global v-if="isloading"></preloader-global>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
               <sidebar-admin :appProperties="appGetProperties" :AppName="AppName"></sidebar-admin>
          <!-- TOP Nav Bar -->
               <header-admin></header-admin>
          <!-- TOP Nav Bar END -->
          <!-- Page Content  -->

            <div id="content-page" class="content-page text-white" >
             
                <div class="container-fluid" >
                 

                    <keep-alive>
                        <router-view 
                            :sessionToken="appGetProperties.session" 
                             :visitors="appGetProperties.pagesVisited*1"
                           
                            :usersRegistered="appGetProperties.usersRegistered*1" 
                            ></router-view>
                    </keep-alive>
                </div>
          </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <footer-admin>
         
      </footer-admin>
      <!-- Footer END -->
	</div>
</template>
<script>
     import Header from './structure/Header.vue'
     import Sidebar from './structure/Sidebar.vue'
     import Footer from './structure/Footer.vue'


     import { app } from '../../api/app/app'
     export default{
        mixins: [app],
          components:{
               'header-admin' : Header,
               'sidebar-admin' : Sidebar,
               'footer-admin' : Footer
          },
          data:() => ({
               appAdmin: '',
               snackbar: false,
               deleteNotify: false,
                toastCount: 0
               
               
          }),
          computed:{
                isloading: function() {
                    return this.$store.getters.getloading
                },
                isOk: function() {
                    return this.$store.getters.getResponse
                },

            },
          mounted(){
                this.appAdmin = app

          },
           watch:{

              

          },
          methods:{
                openInfo(){
                    // this.snackbar = true
                    // this.$vuetify.goTo(0)
                    // this.makeToast()
                     
                },
                closeInfo(){
                    // this.snackbar = false
                    // this.$vuetify.goTo(0)
                },
                openInfoDelete(){
                    // this.deleteNotify = true
                    // this.$vuetify.goTo(0)
                    // this.makeToastDelete()
                     
                },
                closeInfoDelete(){
                   this.deleteNotify = false
                   this.$vuetify.goTo(0)
                },
                makeToast(append = false, variant = null) {
                   
                },

                makeToastDelete(append = false, variant = null) {
                    
                }

          }
     };
</script>

<style type="text/css">
 
</style>