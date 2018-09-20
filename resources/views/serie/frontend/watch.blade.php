<style>
#contentlesson{
text-align: center;
}
</style>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-8">
        <div class="align-center" id="contentlesson">
          <div class="card shadow-lg">
                <div class="card-body">
                    <vue-player default_lesson="{{$lesson}}"></vue-player>
                </div>
                <h1>{{$lesson->title}}</h1>
                 <p>{{$lesson->description}}</p>
          </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-lg">
        <div class="card-body">
                <ul class="list-group">
                    @foreach($serie->lessons as $lesson)
                    <li class="list-group-item"><a href="{{route('watch_serie',[$serie->slug,$lesson->id])}}">{{$lesson->title}}</a></li>
                    @endforeach
                </ul>
        </div>
    </div>
    </div>
</div>
</div>
@endsection

