<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeriesTest extends TestCase
{

    use DatabaseMigrations;

    public function test_a_user_can_create_test(){

        $this->withoutExceptionHandling();

        Storage::fake(config('filesystems.default'));

        $this->post(route('serie.store'),[
            'title'=>'loerm ipsum dady',
            'description'=>'loerm ipsum lorem ipsum da bla bla.',
            'image'=>UploadedFile::fake()->image('image.png')
        ])->assertRedirect();


        Storage::disk(config('filesystems.default'))->assertExists('series/'.str_slug('loerm ipsum dady').'.png');

        $this->assertDatabaseHas('series',['slug'=>str_slug('loerm ipsum dady')]);
    }



}
