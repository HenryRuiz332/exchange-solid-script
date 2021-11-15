@extends('welcome')
@section("meta_tags")
    
    <meta name="robots" content="noindex"/>
    
@endsection
@section('content')
     <div class="wrapper" style="margin-top: 150px;">
            <div class="container p-0">
                <div class="row no-gutters">
                   {{--  <div class="col-sm-12 col-md-6 col-lg-6text-center">
                        <div class="iq-error error-500 text-center">
                            <img src="/assets/images/error/404.svg" class="img-fluid iq-error-img" alt="error" width="400" height="400">
                        </div>
                    </div> --}}
                     <div class="col-sm-12 col-md-1 col-lg-12 text-center">
                        <div class="iq-error error-500">
                            <h2 class="mb-0">Oops! Ocurred Internal Server Error.</h2>
                            
                            {{-- <a class="btn btn-primary mt-3" href="/"><i class="ri-home-4-line"></i>Back to Home</a> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection