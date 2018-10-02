<style>
.bg {
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity : 0.3;
    position: relative;
}
#button{
    position: absolute;
    top: 40%;
    left: 25%;
    font-size: 50px;
    text-align: center;
}
</style>
@extends('layouts.app')

@section('content')
    <div class="contentall bg" style="background-image: url({{$serie->image_path}});">

    </div>
        <div id="button">
        <p>{{ $serie->title}}</p>
            @auth
                @hasstartserie($serie)
                <a href="{{route('goto_serie',$serie->slug)}}" class="btn btn-lg btn-primary">Continue learning</a>
                @else
        <a href="{{route('goto_serie',$serie->slug)}}" class="btn btn-lg btn-primary">Start learning</a>
                @endhasstartserie
            @endauth
            @guest
        <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Start learning now</a>   
            @endguest
        </div>
@endsection

