<?php

// namespace Tests\Feature;

// use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use App\Course;

// class CourseTest extends TestCase
{
	// use DatabaseMigrations;

	// /**
	// * @group createcoursevisit
	// *
	// * @test
	// */
 //    public function TeacherCreateCourseAndVisitIt(){
    	
 //    	// arrangement 
 //    	$course = Course::create(['title'=>'course 1 ','content'=>'Test driven development is a blablabla']);
 //    	// action
 //    	$res = $this->get("/course/".$course->id);
 //    	// assert 
 //    	$res->assertStatus(200);
 //    	$res->assertSee($course->title);
 //    	$res->assertSee($course->content);
 //    	$res->assertSee($course->created_at);

 //    }

 //    /**
 //    *	@group wrongurl
 //    *	@test 
 //    */

 //    public function IfWrongId404(){

 //    	$res = $this->get('course/invalid_id');
 //    	$res->assertStatus(404);
 //    	$res->assertSee('Sorry, the page you are looking for could not be found.');
 //    }


 //     /**
 //     * @group allcourses
 //     * @test
 //     */
 //     public function testShowAllCourses(){
    	
 //     	// arrangement

 //     	$c1 = factory(Course::class)->create();
 //     	$c2 = factory(Course::class)->create();

 //     	// action

 //     	$res = $this->get('/allcourses');

 //     	// asserttion

 //     	$res->assertStatus(200);
 //     	$res->assertSee($c1->title);
 //     	$res->assertSee($c1->content);
 //     	$res->assertSee($c2->title);
 //     	$res->assertSee($c2->content);

 //     }


 //     public function test_user_create_course(){
 //         //arrangement

 //         //action
 //            $resp = $this->post('/create/course',['title'=>'hello world','content'=>'hello']);

 //         //assert
 //            $this->assertDatabaseHas('courses',['title'=>'hello world','content'=>'hello']);
 //            $course = Course::find(1);
 //            $this->assertEquals('hello world',$course->title);
 //            $this->assertEquals('hello',$course->content);
 //     }




}
