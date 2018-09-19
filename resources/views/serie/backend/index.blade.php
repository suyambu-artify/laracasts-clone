@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="breadcump">
           <a href="{{route('serie.create')}}">new serie</a>
        </div>

        <div class="row justify-content-center">
                <div class="bg-white">
                    <table class="table">
                        <thead>
                        <tr>
                          <th>title</th>
                          <th>thumbnail</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    @forelse($series as $serie)
                        <tr>
                          <td>{{$serie->title}}</td>
                          <td>thumbnail</td>
                          <td>
                              <a href="{{route('serie.show',$serie->slug)}}" class="badge badge-success">view</a>
                              <a href="{{route('serie.edit',$serie->slug)}}" class="badge badge-info">Edit</a>
                              <a href="#" class="badge badge-danger">Delete</a>
                          </td>
                        </tr>
                    @empty
                    <tr>
                        <td>no series until yet</td>
                    </tr>
                    @endforelse

                        </tbody>
                        </table>
                </div>
        </div>
    </div>
@endsection


