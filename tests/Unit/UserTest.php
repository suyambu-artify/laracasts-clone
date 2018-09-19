<?php

namespace Tests\Unit;

use App\User;
use App\Lesson;
use Tests\TestCase;
use Illuminate\Support\Facades\Redis;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_has_complete_lesson(){
		
		$this->flushRedis();
		
		$user = factory(User::class)->create();
		$lesson = factory(Lesson::class)->create();
		$lesson2 = factory(Lesson::class)->create(['serie_id'=>1]);
		
		$user->hascompletelesson($lesson);
		$user->hascompletelesson($lesson2);

		$this->assertEquals(Redis::smembers("user.1.serie.1"), [1,2]);

	}


	public function test_percentage_completed_serie(){

		$this->flushRedis();
		$user = factory(User::class)->create();
		$lesson = factory(Lesson::class)->create();
		$lesson2 = factory(Lesson::class)->create(['serie_id'=>1]);
		factory(Lesson::class)->create(['serie_id'=>1]);
		factory(Lesson::class)->create(['serie_id'=>1]);

		$user->hascompletelesson($lesson);
		$user->hascompletelesson($lesson2);
		
		$this->assertEquals($user->calcpercentage($lesson->serie), 50);

		// completed lesson count 
		$this->assertEquals($user->getnumbercompletedlessons($lesson->serie),2);
	}

	public function test_a_user_has_start_a_serie(){

		$this->withoutExceptionHandling();
		$this->flushRedis();
		$user = factory(User::class)->create();
		$lesson = factory(Lesson::class)->create();
		$lesson2 = factory(Lesson::class)->create(['serie_id'=>1]);
		$lesson3 = factory(Lesson::class)->create();
		$user->hascompletelesson($lesson2);
		$this->assertTrue($user->hasstartserie($lesson->serie));
		$this->assertFalse($user->hasstartserie($lesson3->serie));

	}

	public function test_can_get_completed_lessons_for_serie(){

		$this->flushRedis();
		$user = factory(User::class)->create();
		$lesson = factory(Lesson::class)->create();
		$lesson2 = factory(Lesson::class)->create(['serie_id'=>1]);
		$lesson3 = factory(Lesson::class)->create(['serie_id'=>1]);
		$user->hascompletelesson($lesson);
		$user->hascompletelesson($lesson2);
		$completedlessons = $user->getcompletedlessons($lesson->serie);
		$this->assertInstanceOf(\Illuminate\Support\Collection::class, $completedlessons);
		$this->assertInstanceOf(Lesson::class, $completedlessons->random());
		$completedLessonsIds = $completedlessons->pluck('id')->all();
		$this->assertTrue(in_array($lesson->id,$completedLessonsIds));
		$this->assertTrue(in_array($lesson2->id,$completedLessonsIds));
		$this->assertFalse(in_array($lesson3->id,$completedLessonsIds));

	} 


}
