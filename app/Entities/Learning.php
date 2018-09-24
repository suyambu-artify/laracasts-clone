<?php

namespace App\Entities;

use App\Lesson;
use Illuminate\Support\Facades\Redis;

trait Learning {

    public function completelesson($lesson){
        Redis::sadd("user.{$this->id}.serie.{$lesson->serie->id}",$lesson->id);
    }

    public function calcpercentage($serie){
      $totalessons = $serie->lessons->count();
      $completedlessons = $this->getnumbercompletedlessons($serie);
      return ($completedlessons/$totalessons)*100;
    }

    public function getnumbercompletedlessons($serie){
        return count($this->completedlessonsinserie($serie));
    }

    public function completedlessonsinserie($serie){
      return Redis::smembers("user.{$this->id}.serie.{$serie->id}");
    }

    public function hasstartserie($serie){
       return $this->getnumbercompletedlessons($serie) > 0;
    }

    public function getcompletedlessons($serie){
        $completedlessons = $this->completedlessonsinserie($serie);
        return collect($completedlessons)->map(function($lessonId){
            return Lesson::find($lessonId);
        });
    }

    public function hasCompleteLesson($lesson){
        return in_array($lesson->id,$this->completedlessonsinserie($lesson->serie));
    }


}
