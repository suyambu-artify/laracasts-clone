<?php

namespace App\Entities;

use App\Lesson;
use App\Serie;
use Illuminate\Support\Facades\Redis;

trait Learning
{
    public function completelesson($lesson)
    {
        Redis::sadd("user.{$this->id}.serie.{$lesson->serie->id}", $lesson->id);
    }

    public function calcpercentage($serie)
    {
        $totalessons = $serie->lessons->count();
        $completedlessons = $this->getnumbercompletedlessons($serie);
        return ($completedlessons/$totalessons)*100;
    }

    public function getnumbercompletedlessons($serie)
    {
        return count($this->completedlessonsinserie($serie));
    }

    public function completedlessonsinserie($serie)
    {
        return Redis::smembers("user.{$this->id}.serie.{$serie->id}");
    }

    public function hasstartserie($serie)
    {
        return $this->getnumbercompletedlessons($serie) > 0;
    }

    public function getcompletedlessons($serie)
    {
        $completedlessons = $this->completedlessonsinserie($serie);
        return collect($completedlessons)->map(function ($lessonId) {
            return Lesson::find($lessonId);
        });
    }

    public function hasCompleteLesson($lesson)
    {
        return in_array($lesson->id, $this->completedlessonsinserie($lesson->serie));
    }

    public function idserieswatched(){
        $keys = Redis::keys("user.{$this->id}.serie.*");
        $seriesids = [];
        foreach ($keys as $key){
            $serieid = explode('.',$key)[3];
            array_push($seriesids,$serieid);
        }
        return $seriesids;
    }

    public function seriesbeingwatched(){
        return collect($this->idserieswatched())->map(function ($id) {
            return Serie::find($id);
        })->filter();
    }


    public function gettotalofcompledlessons(){
        $keys = Redis::keys("user.{$this->id}.serie.*");
        $result = 0;
        foreach ($keys as $key){
            $result = $result + count(Redis::smembers($key));
        }
        return $result;
    }

    public function getNextLessonToWatch($serie){
        $lessonIds = $this->completedlessonsinserie($serie);
        $lessonId = end($lessonIds);
        return Lesson::find($lessonId)->nextLesson();
    }

}
