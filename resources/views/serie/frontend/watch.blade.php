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
    <div class="controllers_lesson">
       
        @if($lesson->prevLesson())
        <a href="{{ route('watch_serie',[$serie->slug,$lesson->prevLesson()->id]) }}" class="btn btn-success">previous</a>
        @else
        <button class="btn btn-success" disabled="disabled">previous</button>
        @endif

        @if($lesson->nextLesson())
        <a href="{{ route('watch_serie',[$serie->slug,$lesson->nextLesson()->id]) }}" class="btn btn-success">next</a>
        @else
        <button class="btn btn-success" disabled="disabled">next</button>
        @endif

    </div>
    <br>
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
    @foreach($serie->getOrderdlessons() as $l)
        @if($l->id == $lesson->id)
    <li class="list-group-item active"><a class="text-white" href="{{route('watch_serie',[$serie->slug,$l->id])}}">{{$l->title}}</a></li>
    @else
        <li class="list-group-item"><a  href="{{route('watch_serie',[$serie->slug,$l->id])}}" >{{$l->title}}</a></li>
        @endif        
    @endforeach
</ul>
</div>
</div>
</div>
</div>
</div>
@endsection

