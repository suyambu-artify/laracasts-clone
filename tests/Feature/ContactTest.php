<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    public function testUserSeeContact(){
    	$res = $this->get('contact');
    	$res->assertStatus(200);
    	$res->assertSee('hello world');
    }
}
