@if(Auth::user() == null)
    @extends('welcome')
    @section("meta_tags")
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="author" content="" />
        <meta name="copyright" content="" />
        <meta name="robots" content="index"/>
        <title>Login | {{ config('app.name')}} - Exchange</title>
    @endsection
    @section('content')
    <div class="container-fluid" stye="z-index:1000!important">
        <div class="row">
           <div class="row" id="login">
                <div >
                    <login ></login>
                </div>
            </div>
        </div> 
    </div>
    @endsection
    <script src="{{ asset('admin/dashboard/js/login.js') }}" defer></script>
    @include('layouts.vito.styles')

    <style type="text/css">
        #header, #header.header-inner-pages {
             background: rgb(23 25 35 / 89%);
        }


        .btn-outline-primary {
            color: #171923!important;
            border-color: #171923!important;
        }
        .btn-outline-primary:hover{
            background:  #171923!important;
            color: #FBC151!important;
            transition: ease all .4s;
        }
        
    </style>
@else
    <script type="text/javascript">
         window.location.href= '/my-account/dashboard/' + localStorage.session_app
    </script>
@endif