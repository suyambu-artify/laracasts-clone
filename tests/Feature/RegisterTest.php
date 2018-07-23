<?php

namespace Tests\Feature;

use App\Mail\RegisterActiveAccount;
use Illuminate\Support\Facades\Mail;
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

		$this->post('/register',['name'=>'moktar br','email'=>'m@gmail.com','password'=>'123456'])
            ->assertRedirect();
		$this->assertDatabaseHas('users',['username'=>'moktar-br']);

    }

    public function test_email_will_sent_to_active_account(){

        Mail::fake();

        $this->post('/register',['name'=>'moktar br','email'=>'m@gmail.com','password'=>'123456'])
            ->assertRedirect();

        Mail::assertSent(RegisterActiveAccount::class);

    }





}
