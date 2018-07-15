<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class about extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testUserVisitAbout(){
    	$res = $this->get('/about');
    	$res->assertStatus(200);
    	$res->assertSee('hey');
    }



}
