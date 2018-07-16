<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Post;

class PostTest extends TestCase
{
	use DatabaseMigrations;

	public function testPostCreateAndVisit(){
		
		// arrangement 

		$post = Post::create(['title'=>'hello','text'=>'loerm ipsum']);

		// action 

		$response = $this->get('/post/'.$post->id);


		// assert 

		$response->assertStatus(200);
		$response->assertSee($post->title);
		$response->assertSee($post->text);


	}

}
