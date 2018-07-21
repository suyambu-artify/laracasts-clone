<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;


    public function test_registration_new_user(){
    	
    	// arrangement 
    	// action 
    	// assert 

		$this->post('/register',['name'=>'moktar br','email'=>'m@gmail.com','password'=>'123456'])->assertStatus(302);
		$this->assertDatabaseHas('users',['username'=>'moktar-br']);
    }
}
