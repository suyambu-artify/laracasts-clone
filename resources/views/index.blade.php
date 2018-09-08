@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

		@forelse($series as $serie)
			<div class="col-3" style="margin-right: 10px;margin-bottom: 10px">
				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="{{$serie->image_path}}" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">{{ $serie->title }}</h5>
				    <p class="card-text">{{ $serie->description }}</p>
				    <a href="#" class="btn btn-primary">start serie</a>
				  </div>
				</div>
			 </div>
		@empty
			<h1>no series yet</h1>
		@endforelse

    </div>
</div>
@endsection
