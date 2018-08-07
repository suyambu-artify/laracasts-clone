<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['title','slug','image','description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
