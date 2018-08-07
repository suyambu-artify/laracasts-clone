<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title','description','serie_id','episode_number','video_id'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}
