<template>
	<div class="row">
     
                  <div class="col-sm-6 col-md-6 col-lg-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center justify-content-between text-right">
                              <div class="icon iq-icon-box rounded-circle bg-success">
                                 <i class="fa fa-users" aria-hidden="true"></i>
                              </div>
                              <div>
                                 <h5 class="mb-0">Clientes</h5>
                                 <span class="h4 text-success mb-0  d-inline-block w-100">{{ usersRegistered }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center justify-content-between text-right">
                              <div class="icon iq-icon-box rounded-circle bg-danger">
                                 <i class="fa fa-map"></i>
                              </div>
                              <div>
                                 <h5 class="mb-0">Direcciones</h5>
                                 <span class="h4 text-danger mb-0  d-inline-block w-100">{{visitors}}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               
                  
               </div>
</template>
<script>
    
     export default{
            props:{
               visitors: Number,
               usersRegistered: Number,
            },
          data:() => ({
             
          }),
          computed:{
               
       
          },
          mounted(){
              

          },
          methods:{
                    


          }
     };
</script>