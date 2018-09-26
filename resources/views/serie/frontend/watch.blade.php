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
       
       @php
        $nextlesson = $lesson->nextLesson();
        $prevlesson = $lesson->prevLesson();
       @endphp

        @if($prevlesson)
        <a href="{{ route('watch_serie',[$serie->slug,$prevlesson->id]) }}" class="btn btn-success">previous</a>
        @else
        <button class="btn btn-success" disabled="disabled">previous</button>
        @endif

        @if($nextlesson)
        <a href="{{ route('watch_serie',[$serie->slug,$nextlesson->id]) }}" class="btn btn-success">next</a>
        @else
        <button class="btn btn-success" disabled="disabled">next</button>
        @endif

    </div>
    <br>
    


    <vue-player default_lesson="{{$lesson}}"

      @if($nextlesson)
        next_lesson="{{ route('watch_serie',[$serie->slug,$nextlesson->id]) }}"
     @endif >
         
     </vue-player>
     
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
        <li class="list-group-item @if($l->id == $lesson->id) active @endif">
           
            <a style="color:#000;" href="{{route('watch_serie',[$serie->slug,$l->id])}}" >{{$l->title}}</a>
            @auth
            <div class=" d-flex justify-content-end">
                @if(auth()->user()->hasCompleteLesson($l))<span class="badge badge-danger">completed</span>@endif
            </div>
            @endauth
        </li>
    @endforeach
</ul>
</div>
</div>
</div>
</div>
</div>
@endsection

