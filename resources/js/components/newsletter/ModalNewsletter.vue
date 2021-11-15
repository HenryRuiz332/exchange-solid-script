<template>
    <div class="container">
        <div class="row justify-content-center">
            window.addEventListener ('scroll', this.scrollBackTop); 

scrollBackTop () {
                const that = this;
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
                that.scrollTop = scrollTop;
                if (that.scrollTop > 60) {
                     that.showIcon = true;
                } else {
                    that.showIcon = false;
                }
            },
            destroyed () {
                window.removeEventListener('scroll', this.scrollBackTop)
            },
            toop(){
                 window.addEventListener ('scroll', this.scrollBackTop);
            },
        </div>
    </div>
</template>

<script>
    export default {
        data:() =>({
            
        }),
        computed:{
            appName(){
               
            }
        },
        mounted() {
            
        },
        methods:{
            
        }
    };
</script>
