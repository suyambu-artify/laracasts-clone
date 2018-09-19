<style>
#contentlesson{
    text-align: center;
}
</style>
    @extends('layouts.app')
    
    @section('content')
       <div class="container-fluid">
        <div class="align-center" id="contentlesson">
            <h1>{{$lesson->title}}</h1>
             <p>{{$lesson->description}}</p>
        </div>
       </div>
    @endsection
    
    