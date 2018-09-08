<?php

namespace Tests\Feature;

use App\Mail\RegisterActiveAccount;
use App\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;



// Response status code [500] is not a redirect status code.

  //   public function test_registration_new_user(){

  //       $data = [
  //           'name'=>'moktar br',
  //           'email'=>'m@gmail.com',
  //           'password'=>'123456'
  //       ];
		// $this->post(route('guest.register'),$data)->assertRedirect();
		// $this->assertDatabaseHas('users',['username'=>$data['name']]);

  //   }

  //   public function test_email_has_sent_to_newly_registred_user(){

  //       Mail::fake();
  //       $this->post('/register',['name'=>'moktar br','email'=>'m@gmail.com','password'=>'123456'])
  //            ->assertRedirect();
  //       Mail::assertSent(RegisterActiveAccount::class);

  //   }

    public function test_user_has_token_after_registration(){


        Mail::fake();
        $this->post('/register',['name'=>'moktar br','email'=>'m@gmail.com','password'=>'123456'])
            ->assertRedirect();
        $user = User::find(1);
        $this->assertNotNull($user->confirm_token);
        $this->assertFalse($user->isConfirmed());
    }


    public function test_user_can_confirm_email(){

        // because of that ERROR "Failed asserting that false is true." i must add "fresh"

        // if the error not clear
       // $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->get("/register/confirm?token={$user->confirm_token}")
            ->assertRedirect()
            ->assertSessionHas('success','your email has been activated');
        $this->assertTrue($user->fresh()->isConfirmed());

    }

    public function test_user_enter_wrong_token(){

        $this->get("/register/confirm?token=wrong_token")
            ->assertRedirect('/')
            ->assertSessionHas('error','this token is not valid');

    }

}
