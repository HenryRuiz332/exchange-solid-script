@extends('errors::minimal')


@section("meta_tags")
	
	<meta name="robots" content="noindex"/>
	
@endsection
@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
