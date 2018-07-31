<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieValidation;
use App\Serie;
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

    public function store(SerieValidation $request)
    {

        $title = $request->title;

        $uploaded_image = $request->image;
        $image_name = str_slug($title).'.'.$uploaded_image->getClientOriginalExtension();
        $uploaded_image->storePubliclyAs('series',$image_name);

        Serie::create([
            'title'=>$request->title,
            'slug'=>str_slug($title),
            'description'=>$request->description,
            'image'=>'series/'.$image_name,
        ]);

        session()->flash('success','new series has been add');
        return redirect()->back();
    }


    public function show($id)
    {
        //
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
