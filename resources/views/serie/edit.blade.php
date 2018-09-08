@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="breadcump">
            <a href="{{route('serie.index')}}">all series</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('serie.update',$serie->slug) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" value="{{$serie->title}}">
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$serie->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="image" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


