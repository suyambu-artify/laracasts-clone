@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$user->name}}</h1>
                    </div>
                    @if($seriesbeingwatched)
                        <div class="card-body">

                            <h5>comleted lessons : </h5>
                            <ul class="list-group">
                                @foreach($seriesbeingwatched as $serie)
                                    <li><img src="{{$serie->image_path}}" alt="" height="80px" width="80px"></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    @if($gettotalofcompledlessons)
                    <div class="card-body">
                        <h6>Number of completed lessons : {{$gettotalofcompledlessons}}</h6>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</div>
@endsection
