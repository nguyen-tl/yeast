@extends('layouts.root_layout')
@section('title')Detail
@endsection
@section('css')
<style type="text/css">
	
</style>
@endsection
@section('content')
@include('layouts.navbar')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 flex-center">
		<h2>{{$post->title}}</h2>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<p>{{$post->body}}</p>
	</div>
	<div class="col-md-1"></div>
</div>
<br><br>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 flex-center">
		<div class="fb-comments" data-href="{{route('get-detail-post', $post->id)}}" data-width="" data-numposts="10" data-order-by="reverse_time"></div>
	</div>
	<div class="col-md-1"></div>
</div>
@endsection
