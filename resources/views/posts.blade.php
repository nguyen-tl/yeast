@extends('layouts.root_layout')
@section('title')Posts
@endsection
@section('css')
<style type="text/css">
	th,td {
		border: 1px solid black;
		text-align: center;
	}
</style>
@endsection
@section('content')
@include('layouts.navbar')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Title</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@if(isset($posts) && count($posts)>0)
					@foreach($posts as $post)
						<tr>
							<td>{{$post->title}}</td>
							<td><a href="{{route('get-detail-post', $post->id)}}">Detail</a></td>
						</tr>
					@endforeach
				@else
				No data
				@endif
			</tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 flex-center">{{ $posts->links() }}</div>
	<div class="col-md-4"></div>
</div>
@endsection
