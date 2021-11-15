@extends('errors::minimal')
@section("meta_tags")
	
	<meta name="robots" content="noindex"/>
	
@endsection
@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
