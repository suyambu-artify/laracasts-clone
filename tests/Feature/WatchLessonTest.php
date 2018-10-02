<?php

namespace Tests\Feature;

use App\User;
use App\Lesson;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WatchLessonTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_watch_and_complete_lesson(){

        $this->withoutExceptionHandling();

        $this->flushRedis();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $lesson = factory(Lesson::class)->create();
        $lesson2 = factory(Lesson::class)->create(['serie_id'=>1]);
        
        $this->post(route('lessonhaswatched',$lesson->id),[])
             ->assertStatus(200)
             ->assertJson(['status'=>'ok']);

        $this->assertTrue($user->hasCompleteLesson($lesson));
        $this->assertFalse($user->hasCompleteLesson($lesson2));
    }
}
