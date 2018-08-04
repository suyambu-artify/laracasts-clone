<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Config;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function Admin(){

        $user = factory(User::class)->create();

        Config::push('udemy.admin',$user->email);

        $this->actingAs($user);



    }

}
