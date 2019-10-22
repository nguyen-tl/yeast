@extends('layouts.root_layout')
@section('title')Detail
@endsection
@section('css')
<style type="text/css">
	.tit {
		font-weight: 600;
	}
	.borderd {
		border: 2px solid grey
	}
	.margin15 {
		margin: 15px
	}
	.borderd-noneleft {
		border-style: solid;
		border-width: 2px 2px 2px 0px;
		border-color: grey;
	}
	.borderd-nonetop {
		border-style: solid;
		border-width: 0px 2px 2px 2px;
		border-color: grey;
	}
	.borderd-nonetop-noneleft {
		border-style: solid;
		border-width: 0px 2px 2px 0px;
		border-color: grey;
	}
</style>
@endsection
@section('content')
@include('layouts.navbar')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-6 borderd">
				<div class="row margin15">
					<span class="tit">Species:</span>
				</div>
				<div class="row margin15">
					{{$yeast->species}}
				</div>
				<div class="row margin15">
					<span class="tit">Storage location:</span>
				</div>
				<div class="row margin15">
					{{$yeast->storage_location}}
				</div>
			</div>
			<div class="col-md-3 borderd-noneleft">
				<div class="row margin15"><span class="tit">Carotenoid (ug/g)</span></div>
				<div class="row margin15"><span class="tit">beta-carotene (ug/g)</span></div>
				<div class="row margin15"><span class="tit">Amlyase (Y/N)</span></div>
				<div class="row margin15"><span class="tit">Cellulase (Y/N)</span></div>
				<div class="row margin15"><span class="tit">Protease (Y/N)</span></div>
				<div class="row margin15"><span class="tit">TTC (Y/N)</span></div>
			</div>
			<div class="col-md-3 borderd-noneleft">
				<div class="row margin15">{{$yeast->total_carotenoid}}</div>
				<div class="row margin15">{{$yeast->beta_carotene}}</div>
				<div class="row margin15">{{$yeast->amylase==1 ? '+' : '-'}}</div>
				<div class="row margin15">{{$yeast->cellulase==1 ? '+' : '-'}}</div>
				<div class="row margin15">{{$yeast->protease==1 ? '+' : '-'}}</div>
				<div class="row margin15">{{$yeast->ttc==1 ? '+' : '-'}}</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 borderd-nonetop">
				<div class="row margin15">
					<span class="tit">ITS sequences</span>
				</div>
				<div class="row margin15">
					{{$yeast->its_sequences}}
				</div>
			</div>
			<div class="col-md-6 borderd-nonetop-noneleft">
				<div class="row margin15">
					<span class="tit">D1/D2 sequences</span>
				</div>
				<div class="row margin15">
					{{$yeast->d1_d2_sequences}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 borderd-nonetop">
				<div class="row">
					@if(!empty($yeast->species_imgs))
						@foreach($yeast->species_imgs as $colony)
						<div class="col">
							<img src="{{url('/upload/' . $colony)}}"/><br>Colony
						</div>
						@endforeach
					@endif
					@if(isset($yeast->amylase_img))
						<div class="col">
							<img src="{{url('/upload/' . $yeast->amylase_img)}}"/><br>Amylase
						</div>
					@endif
					@if(isset($yeast->cellulase_img))
						<div class="col">
							<img src="{{url('/upload/' . $yeast->cellulase_img)}}"/><br>Cellulase
						</div>
					@endif
					@if(isset($yeast->protease_img))
						<div class="col">
							<img src="{{url('/upload/' . $yeast->protease_img)}}"/><br>Protease
						</div>
					@endif
					@if(isset($yeast->ttc_img))
						<div class="col">
							<img src="{{url('/upload/' . $yeast->ttc_img)}}"/><br>TTC
						</div>
					@endif
				</div> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 borderd-nonetop">
				<div class="row justify-content-center">
					<form action="{{route('update-img', $yeast->id)}}" method="post" enctype='multipart/form-data'>
					@csrf
					@method('PUT')
					<div class="form-group row">
						<label for="species_imgs" class="col-sm-2 col-form-label">Species Images</label>
						<div class="col-sm-10">
							<input type="file" accept="image/*" class="form-control" id="species_imgs" name="species_imgs[]" multiple="multiple">
						</div>
					</div>
					@if(!isset($yeast->amylase_img))
						<div class="form-group row">
							<label for="amylase_img" class="col-sm-2 col-form-label">Amylase Image</label>
							<div class="col-sm-10">
								<input type="file" accept="image/*" class="form-control" id="amylase_img" name="amylase_img">
							</div>
						</div>
					@endif
					@if(!isset($yeast->cellulase_img))
						<div class="form-group row">
							<label for="cellulase_img" class="col-sm-2 col-form-label">Cellulase Image</label>
							<div class="col-sm-10">
								<input type="file" accept="image/*" class="form-control" id="cellulase_img" name="cellulase_img">
							</div>
						</div>
					@endif
					@if(!isset($yeast->protease_img))
						<div class="form-group row">
							<label for="protease_img" class="col-sm-2 col-form-label">Protease Image</label>
							<div class="col-sm-10">
								<input type="file" accept="image/*" class="form-control" id="protease_img" name="protease_img">
							</div>
						</div>
					@endif
					@if(!isset($yeast->ttc_img))
						<div class="form-group row">
							<label for="ttc_img" class="col-sm-2 col-form-label">TTC Image</label>
							<div class="col-sm-10">
								<input type="file" accept="image/*" class="form-control" id="ttc_img" name="ttc_img">
							</div>
						</div>
					@endif
					<div class="form-group row">
						<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
@endsection
