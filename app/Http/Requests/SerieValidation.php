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
//            'title'=>'required',
//            'description'=>'required',
//            'image'=>'required|mimes:jpeg,bmp,png'
        ];
    }
//
//    public function ImageUpload(){
//        $uploaded_image = $this->image;
//        $this->image_name = str_slug($this->title).'.'.$uploaded_image->getClientOriginalExtension();
//        $uploaded_image->storePubliclyAs('series',$this->image_name);
//
//        return $this;
//    }
//
//    public function StoreSerie(){
//        Serie::create([
//            'title'=>$this->title,
//            'slug'=>str_slug($this->title),
//            'description'=>$this->description,
//            'image'=>'series/'.$this->image_name,
//        ]);
//    }

}
