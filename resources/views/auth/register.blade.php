@extends('welcome')
@section("meta_tags")
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content="" />
    <meta name="copyright" content="" />
    <meta name="robots" content="index"/>
    <title>Registrarse | Exchange  - {{ config('app.name')}} </title>
@endsection
@section('content')
<div class="container-fluid" stye="z-index:1000!important">

    <div class="row" >
       <div class="row" id="register">
            <div >
                <register ></register>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('admin/dashboard/js/register.js') }}" defer></script>
@include('layouts.vito.styles')

<style type="text/css">
    #header, #header.header-inner-pages {
         background: rgb(236 208 10 / 89%);
    }
    
</style>