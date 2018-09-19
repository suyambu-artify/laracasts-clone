<?php

namespace App\Http\Controllers\Admin;

use App\Serie;
use App\Http\Requests\SerieValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{

    public function index()
    {
        $series = Serie::all();
        return view('serie.backend.index')->with('series',$series);
    }


    public function create()
    {
        return view('serie.backend.create');
    }

    public function store(SerieValidation $request){

        return $request->uploadImage()->createSerie();
    }


    public function show(Serie $serie)
    {
        return view('serie.backend.show')->withSerie($serie);
    }


    public function edit(Serie $serie)
    {
        return view('serie.backend.edit')->withSerie($serie);
    }


    public function update(Serie $serie,Request $request){

        // delete old image
        if ($request->hasFile('image')){
            $oldimg = public_path("public/series/{$serie->image}");
            if (\File::exists($oldimg)) {
              unlink($oldimg);
            }
            $image = $request->image;
            $name_img = str_slug($request->title).'.'.$image->getClientOriginalExtension();
            $image->storePubliclyAs('/public/series',$name_img);
        }
        $name_img = 'default.png';
        $serie->title = $request->title;
        $serie->description = $request->description;
        $serie->image = '/series/'.$name_img;
        $serie->slug = str_slug($request->title);
        $serie->save();
        session()->flash('success','updated');
        return redirect()->route('serie.index');
    }

    public function destroy($id)
    {
        //
    }
}
