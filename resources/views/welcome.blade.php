@extends('layouts.root_layout')
@section('title')BCPYD
@endsection
@section('content')
<div class="flex-center position-ref full-height">         
    <div class="content">
        <div class="title m-b-md">
            β-carotene producing yeast database
        </div>

        <div class="links">
            <a href="{{route('show-all')}}">Show all</a>
            <a href="{{route('show-form-add-data')}}"><i class="fas fa-plus"></i> Add</a>
        </div>
    </div>
</div>
@endsection('content')
