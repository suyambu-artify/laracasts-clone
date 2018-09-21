<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title','description','serie_id','episode_number','video_id'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    public function nextLesson(){
    	return $this->serie->lessons()->where('episode_number','>',$this->episode_number)
    	->orderBy('episode_number','asc')
    	->first();
    }

    public function prevLesson(){
    	return $this->serie->lessons()->where('episode_number','<',$this->episode_number)
    	->orderBy('episode_number','desc')
    	->first();
    }

}
