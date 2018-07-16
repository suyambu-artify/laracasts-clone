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


    // *
    // *@group ifnocourse404
    // *
    // *@test
    

    // public function IfWrongId404(){
    	
    // }

}
