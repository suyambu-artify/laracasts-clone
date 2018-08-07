@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">

                        <h4 class="text-center">{{$serie->title }}</h4>

                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <vue-lessons default_lessons="{{$serie->lessons}}"></vue-lessons>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


