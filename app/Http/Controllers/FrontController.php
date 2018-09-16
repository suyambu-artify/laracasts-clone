<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class FrontController extends Controller
{
    public function index(){
    	
		$series = Serie::all();
		return view('index')->withSeries($series);
    }
}