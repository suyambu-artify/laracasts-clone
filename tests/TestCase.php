<?php

namespace Tests;

use Config;
use App\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function Admin()
    {
        $user = factory(User::class)->create();

        Config::push('udemy.admin', $user->email);

        $this->actingAs($user);
    }

    public function flushRedis()
    {
        Redis::flushall();
    }
}
