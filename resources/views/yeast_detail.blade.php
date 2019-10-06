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
				<div class="row margin15"><span class="tit">Amlyase (U/ml)</span></div>
				<div class="row margin15"><span class="tit">Cellulase (U/ml)</span></div>
				<div class="row margin15"><span class="tit">Protease (U/ml)</span></div>
				<div class="row margin15"><span class="tit">TTC (Y/N)</span></div>
			</div>
			<div class="col-md-3 borderd-noneleft">
				<div class="row margin15">{{$yeast->total_carotenoid}}</div>
				<div class="row margin15">{{$yeast->beta_carotene}}</div>
				<div class="row margin15">{{$yeast->amylase}}</div>
				<div class="row margin15">{{$yeast->cellulase}}</div>
				<div class="row margin15">{{$yeast->protease}}</div>
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
	</div>
	<div class="col-md-1"></div>
</div>
@endsection
