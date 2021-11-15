<template>

    <div>
        <div class="header bg-primary pb-6">
          <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h6 class="h2 text-white d-inline-block mb-0">Cuentas Bancarias</h6>
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item">
                            <router-link :to="'/my-account/dashboard/' + $attrs.token"><i class="fas fa-home"></i></router-link>
                        </li>
                      <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                      <li class="breadcrumb-item active" aria-current="page">Cuentas Bancarias</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-lg-6 col-5 text-right undraw">
                 <!--  <a href="#" class="btn btn-sm btn-neutral">New</a>
                  <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
                  
                  <img class="d-none d-md-inline-block " src="/vendors/undraw/profile.svg" width="150" height="150">
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="container-fluid mt-3">
          
           
               
           
        </div>
    </div>
    
</template>

<script>
    // import FormProfile from './template_parts/Form'
    // import { profile } from './template_parts/profile' 

    export default {
        // mixins: [profile],
        // components:{
        //     FormProfile
        // },
        data:() =>({
            
            
        }),
        computed:{
            
        },
        mounted() {
            
        },
        methods:{
            
        }
    };
</script>
<style type="text/css">
    
  

</style>
