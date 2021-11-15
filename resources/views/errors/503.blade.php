@extends('welcome')
@section("meta_tags")
    
    <meta name="robots" content="noindex"/>
    
@endsection
@section('content')
	 <div class="wrapper" style="margin-top: 150px;">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-sm-12 text-center">
                        <div class="iq-error error-500">
                            {{-- <img src="images/error/03.png" class="img-fluid iq-error-img" alt=""> --}}
                            <h2 class="mb-0">Oops! Ocurred Internl Server Error.</h2>
                            
                            <a class="btn btn-primary mt-3" href="/"><i class="ri-home-4-line"></i>Back to Home</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection