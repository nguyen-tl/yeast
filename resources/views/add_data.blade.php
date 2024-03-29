@extends('layouts.root_layout')
@section('title')Add data
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
		@if(session()->has('message'))
		<div class="alert alert-success alert-dismissible fade show">
			{{ session()->get('message') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<form action="{{route('add-data')}}" method="post" enctype='multipart/form-data'>
			@csrf
			<div class="form-group row">
				<label for="species" class="col-sm-2 col-form-label">Species</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="species" name='species'>
				</div>
			</div>
			<div class="form-group row">
				<label for="source" class="col-sm-2 col-form-label">Source</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="source" name="source">
				</div>
			</div>
			<div class="form-group row">
				<label for="total_carotenoid" class="col-sm-2 col-form-label">Carotenoid(ug/g)</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="total_carotenoid" name="total_carotenoid">
				</div>
			</div>
			<div class="form-group row">
				<label for="beta_carotene" class="col-sm-2 col-form-label">beta-carotene(ug/g)</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="beta_carotene" name="beta_carotene">
				</div>
			</div>
			<div class="form-group row">
				<label for="amylase" class="col-sm-2 col-form-label">Amlyase(Y/N)</label>
				<div class="col-sm-10">
					<select class="form-control" name="amylase">
						<option value="1">Y</option>
						<option value="0">N</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="cellulase" class="col-sm-2 col-form-label">Cellulase(Y/N)</label>
				<div class="col-sm-10">
					<select class="form-control" name="cellulase">
						<option value="1">Y</option>
						<option value="0">N</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="protease" class="col-sm-2 col-form-label">Protease(Y/N)</label>
				<div class="col-sm-10">
					<select class="form-control" name="protease">
						<option value="1">Y</option>
						<option value="0">N</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="ttc" class="col-sm-2 col-form-label">TTC(Y/N)</label>
				<div class="col-sm-10">
					<select class="form-control" name="ttc">
						<option value="1">Y</option>
						<option value="0">N</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="its_sequences" class="col-sm-2 col-form-label">ITS sequences</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="its_sequences" name="its_sequences">
				</div>
			</div>
			<div class="form-group row">
				<label for="d1_d2_sequences" class="col-sm-2 col-form-label">D1/D2 sequences</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="d1_d2_sequences" name="d1_d2_sequences">
				</div>
			</div>
			<div class="form-group row">
				<label for="storage_location" class="col-sm-2 col-form-label">Storage location</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="storage_location" name="storage_location">
				</div>
			</div>
			<div class="form-group row">
				<label for="species_imgs" class="col-sm-2 col-form-label">Species Images</label>
				<div class="col-sm-10">
					<input type="file" accept="image/*" class="form-control" id="species_imgs" name="species_imgs[]" multiple="multiple">
				</div>
			</div>
			<div class="form-group row">
				<label for="amylase_img" class="col-sm-2 col-form-label">Amylase Image</label>
				<div class="col-sm-10">
					<input type="file" accept="image/*" class="form-control" id="amylase_img" name="amylase_img">
				</div>
			</div>
			<div class="form-group row">
				<label for="cellulase_img" class="col-sm-2 col-form-label">Cellulase Image</label>
				<div class="col-sm-10">
					<input type="file" accept="image/*" class="form-control" id="cellulase_img" name="cellulase_img">
				</div>
			</div>
			<div class="form-group row">
				<label for="protease_img" class="col-sm-2 col-form-label">Protease Image</label>
				<div class="col-sm-10">
					<input type="file" accept="image/*" class="form-control" id="protease_img" name="protease_img">
				</div>
			</div>
			<div class="form-group row">
				<label for="ttc_img" class="col-sm-2 col-form-label">TTC Image</label>
				<div class="col-sm-10">
					<input type="file" accept="image/*" class="form-control" id="ttc_img" name="ttc_img">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-1"></div>
</div>
@endsection
