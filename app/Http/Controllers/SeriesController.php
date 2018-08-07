<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Http\Requests\SerieValidation;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        return view('serie.create');
    }

    public function store(SerieValidation $request){

        return $request->uploadImage()->createSerie();
    }


    public function show(Serie $serie)
    {
        return view('serie.show')->withSerie($serie);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
