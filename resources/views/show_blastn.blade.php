@extends('layouts.root_layout')
@section('title')BLASTn
@endsection
@section('content')
<div class="row">
	<iframe src="https://blast.ncbi.nlm.nih.gov/Blast.cgi?PROGRAM=blastn&PAGE_TYPE=BlastSearch&BLAST_SPEC=&LINK_LOC=blasttab&LAST_PAGE=blastn" style="height: 100%; width: 100%; position: fixed; left:0px; top:-40px;"></iframe>
</div>
@include('layouts.navbar')
@endsection
