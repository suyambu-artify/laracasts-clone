<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Serie;

class SerieValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image',
        ];
    }

    public function uploadImage(){
        $image = $this->image;
        $this->img_name = str_slug($this->title).'.'.$image->getClientOriginalExtension();
        $image->storePubliclyAs('series',$this->img_name);
        return $this;
    }

    public function createSerie(){

        $serie = Serie::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'slug'=>str_slug($this->title),
            'image'=>'series/'.$this->img_name
        ]);

        return redirect()->route('serie.show',$serie->slug);
    }



}
