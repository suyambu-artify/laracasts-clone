<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lesson;
use App\User;

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

		/** @test */
		public function get_next_lesson_when_user_tap_contunie_learning(){
			
			$this->flushRedis();
			$user = factory(User::class)->create();
			$lesson = factory(Lesson::class)->create(['episode_number'=>100]);
			$lesson1 = factory(Lesson::class)->create(['serie_id'=>1,'episode_number'=>200]);
			$lesson2 = factory(Lesson::class)->create(['serie_id'=>1,'episode_number'=>300]);
			$lesson3 = factory(Lesson::class)->create(['serie_id'=>1,'episode_number'=>400]);
			$lesson4 = factory(Lesson::class)->create(['serie_id'=>1,'episode_number'=>500]);
	
		   $user->completelesson($lesson);
		   $user->completelesson($lesson1);
		   $nextlesson = $user->getNextLessonToWatch($lesson->serie);
	
		   $this->assertEquals($lesson2->id,$nextlesson->id);
		   $user->completelesson($lesson3);
		   $this->assertEquals($lesson4->id,$user->getNextLessonToWatch($lesson->serie)->id);
		}

}
