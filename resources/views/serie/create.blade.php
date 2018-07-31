@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('serie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
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


