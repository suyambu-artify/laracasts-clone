<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Course;

class CourseTest extends TestCase
{
	use DatabaseMigrations;

	/**
	* @group createcoursevisit
	*
	* @test
	*/
    public function TeacherCreateCourseAndVisitIt(){
    	
    	// arrangement 
    	$course = Course::create(['title'=>'course 1 ','content'=>'Test driven development is a blablabla']);
    	// action
    	$res = $this->get("/course/".$course->id);
    	// assert 
    	$res->assertStatus(200);
    	$res->assertSee($course->title);
    	$res->assertSee($course->content);
    	$res->assertSee($course->created_at);

    }



    public function testIfWrongId404(){

    	$res = $this->get('course/invalid_id');

    	$res->assertStatus(404);
    	$res->assertSee('Sorry, the page you are looking for could not be found.');
    }

}
