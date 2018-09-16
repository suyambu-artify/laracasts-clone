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

}
