@extends('layouts.root_layout')
@section('title')Database
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
					<th scope="col">Species</th>
					<th scope="col">Carotenoid<br>ug/g</th>
					<th scope="col">beta-carotene<br>ug/g</th>
					<th scope="col">Amlyase<br>Y/N</th>
					<th scope="col">Cellulase<br>Y/N</th>
					<th scope="col">Protease<br>Y/N</th>
					<th scope="col">TTC<br>Y/N</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@if(isset($yeasts) && count($yeasts)>0)
					@foreach($yeasts as $yeast)
						<tr>
							<td>{{$yeast->species}}</td>
							<td>{{$yeast->total_carotenoid}}</td>
							<td>{{$yeast->beta_carotene}}</td>
							<td>{{$yeast->amylase==1 ? '+' : '-'}}</td>
							<td>{{$yeast->cellulase==1 ? '+' : '-'}}</td>
							<td>{{$yeast->protease==1 ? '+' : '-'}}</td>
							<td>{{$yeast->ttc==1 ? '+' : '-'}}</td>
							<td><a href="{{route('get-detail-yeast', $yeast->id)}}">Detail</a></td>
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
	<div class="col-md-4 flex-center">{{ $yeasts->links() }}</div>
	<div class="col-md-4"></div>
</div>
@endsection
