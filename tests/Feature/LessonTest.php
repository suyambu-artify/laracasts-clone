<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Serie;
use App\Lesson;

class LessonTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_admin_can_add_lesson()
    {
        $this->assertEquals(0, Serie::count());
        $this->Admin();
        $lesson = [
            'title'=>'hello world',
            'video_id'=>123,
            'episode_number'=>12,
            'description'=>'loerm ipsum isem'
        ];
        $serie = factory(Serie::class)->create();
        $this->postJson(
            '/admin/'.$serie->id.'/lessons',
            $lesson
        )->assertStatus(201)->assertJson($lesson);

        $this->assertEquals(1, Serie::count());
        $lesson = Lesson::first();
        $this->assertDatabaseHas('lessons', ['title'=>$lesson->title]);
    }

    public function test_every_lesson_must_be_with_title()
    {
        $this->Admin();
        $lesson = [
            'video_number'=>123,
            'episode_number'=>12,
            'description'=>'loerm ipsum isem'
        ];
        $serie = factory(Serie::class)->create();
        $this->post('/admin/'.$serie->id.'/lessons', $lesson)
            ->assertSessionHasErrors('title');
    }

    public function test_lesson_must_be_video_number()
    {
        $this->Admin();
        $lesson = [
            'title'=>'hello world',
            'episode_number'=>12,
            'description'=>'loerm ipsum isem'
        ];
        $serie = factory(Serie::class)->create();
        $this->post('/admin/'.$serie->id.'/lessons', $lesson)
            ->assertSessionHasErrors('video_id');
    }


    public function test_lesson_must_be_with_episodenumber()
    {
        $this->Admin();
        $serie = factory(Serie::class)->create();
        $this->post('/admin/'.$serie->id.'/lessons', [
            'title'=>'loerm ipsum',
            'video_number'=>12,
            'description'=>'leorm ipsum lemin emit'
        ])->assertSessionHasErrors('episode_number');
    }

    public function test_lesson_must_be_with_desc()
    {
        $this->withExceptionHandling();
        $this->Admin();
        $serie = factory(Serie::class)->create();
        $this->post('/admin/'.$serie->id.'/lessons', [
            'title'=>'loerm ipsum',
            'video_number'=>12,
            'episode_number'=>122
        ])->assertSessionHasErrors('description');
    }

    public function test_user_can_update_lesson(){
        
        $this->Admin();
        $serie = factory(Serie::class)->create();
        $lesson = factory(Lesson::class)->create();
        $data = [
            'title'=>'loerm ipsum',
            'video_id'=>12,
            'episode_number'=>122,
            'description'=>'leorm ipsum lemin emit'
        ];
        $this->put('/admin/'.$serie->id.'/lessons/'.$lesson->id,$data)
        ->assertStatus(200);
        $lesson = $lesson->fresh();
        $this->assertEquals($lesson->title,$data['title']);

        }

    public function test_assert_lesson_deleted()
    {
        $this->Admin();
        $serie = factory(Serie::class)->create();
        $lesson = factory(Lesson::class)->create();
        $this->delete('/admin/'.$serie->id.'/lessons/'.$lesson->id)
            ->assertStatus(200)
            ->assertJson(['status'=>'deleted']);
        $this->assertEquals(0,Lesson::count());
        $this->assertDatabaseMissing('lessons',['title'=>$lesson->title]);
    }
}
