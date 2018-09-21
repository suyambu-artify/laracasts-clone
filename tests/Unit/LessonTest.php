<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lesson;

class LessonTest extends TestCase
{
  	use RefreshDatabase;

	public function test_lesson_have_next_and_prev_links(){

	$lessson  = factory(Lesson::class)->create(['episode_number'=>200]);
	$lessson2 = factory(Lesson::class)->create(['episode_number'=>100,'serie_id'=>1]);
	$lessson3 = factory(Lesson::class)->create(['episode_number'=>300,'serie_id'=>1]);

	$this->assertEquals($lessson2->nextLesson()->id,$lessson->id);
	$this->assertEquals($lessson->prevLesson()->id,$lessson2->id);
	$this->assertEquals($lessson->nextLesson()->id,$lessson3->id);	


	}


}
