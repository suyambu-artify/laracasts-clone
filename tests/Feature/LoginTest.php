<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends TestCase
{
    use DatabaseMigrations;


    public function test_If_Credentials_True()
    {
        // arrangement
        $user = factory(User::class)->create();
        // action
        // assert
        $this->postJson('/login', ['email'=>$user->email,'password'=>'secret'])
        ->assertStatus(200)
        ->assertJson(['status'=>'ok'])
        ->assertSessionHas(['success'=>'you had successfully login']);
    }

    public function test_if_login_not_with_json()
    {
        $user = factory(User::class)->create();
        $this->post('/login', ['email'=>$user->email,'password'=>'secret'])
            ->assertRedirect();
    }

    public function test_If_User_Enter_Wrong_Credentials()
    {
        $user = factory(User::class)->create();
        $this->postJson('/login', ['email'=>$user->email,'password'=>'wrong-password'])
        ->assertStatus(422)
        ->assertJson(['message'=>'your email or password is wrong']);
    }
}
