<form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">
	<input name="key" class="form-control mr-sm-2" type="search" value="{{isset($key) ? $key : ''}}" aria-label="Search">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>