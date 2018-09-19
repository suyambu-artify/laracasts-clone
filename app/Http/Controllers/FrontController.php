<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Lesson;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
    	
		$series = Serie::all();
		return view('index')->withSeries($series);
    }

    public function showserie(Serie $serie){
      return view('serie.frontend.show',compact('serie',$serie));
    }

    public function goto_serie(Serie $serie){
      return redirect()->route('watch_serie',['serie'=>$serie,'lesson'=>$serie->lessons->first()->id]);
    }

    public function watch(Serie $serie,Lesson $lesson){
      return view('serie.frontend.watch')->with(['serie'=>$serie,'lesson'=>$lesson]);
    }
}
