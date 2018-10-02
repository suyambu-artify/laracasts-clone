<?php

namespace Tests\Unit;

use App\Serie;
use App\Lesson;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImagepathTest extends TestCase
{

    use RefreshDatabase;

    public function test_image_path_fo_image(){
        $serie = factory(Serie::class)->create(['image'=>'series/img.png']);
        $image_path =$serie->image_path;
        $this->assertEquals(asset('storage/series/img.png'),$image_path);
    }


    public function test_can_get_orderd_lessons_for_serie(){
        $this->flushRedis();
    	$lessson = factory(Lesson::class)->create(['episode_number'=>200]);
    	$lessson2 = factory(Lesson::class)->create(['episode_number'=>100,'serie_id'=>1]);
    	$lessson3 = factory(Lesson::class)->create(['episode_number'=>300,'serie_id'=>1]);
    	$lessons = $lessson->serie->getOrderdlessons();
    	$this->assertInstanceOf(Lesson::class,$lessons->random());
    	$this->assertEquals($lessons->first()->id,$lessson2->id);
    	$this->assertEquals($lessons->last()->id,$lessson3->id);


    }



}
