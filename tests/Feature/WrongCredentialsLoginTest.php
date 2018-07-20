<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class WrongCredentialsLogin extends TestCase
{
	use RefreshDatabase;


    public function test_If_User_Enter_Wrong_Credentials(){

        $user = factory(User::class)->create();
        $this->postJson('/login',['email'=>$user->email,'password'=>'wrong-password'])
        ->assertStatus(422)
        ->assertJson(['message'=>'your email or password is wrong']);
    }


}
