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


    public function test_a_user_can_create_a_serie()
    {

        $this->withoutExceptionHandling();

        Storage::fake(config('filesystems.default'));

        $this->post(route('serie.store'),[
           'title'=>'hello world',
            'description'=>'hello lorem ipsum',
            'image'=>UploadedFile::fake()->image('imagefake.png')
        ])->assertRedirect();

        Storage::disk(config('filesystems.default'))
            ->assertExists('series/'.str_slug('hello world').'.png');

        $this->assertDatabaseHas('series',['slug'=>str_slug('hello world')]);

    }

    public function test_validetion_that_user_must_enter_title(){

        Storage::fake(config('filesystems.default'));

        $this->post(route('serie.store'),[
            'description'=>'hello lorem ipsum',
            'image'=>UploadedFile::fake()->image('imagefake.png')
        ])->assertSessionHasErrors('title');
    }


    public function test_validation_taht_user_must_enter_description(){

        Storage::fake(config('filesystems.default'));

        $this->post(route('serie.store'),[
            'title'=>'hello world',
            'image'=>UploadedFile::fake()->image('imagefake.png')
        ])->assertSessionHasErrors('description');
    }

    public function test_validation_taht_user_must_enter_image(){

        Storage::fake(config('filesystems.default'));
        $this->post(route('serie.store'),[
            'title'=>'hello world',
            'image'=>'invalid_image'
        ])->assertSessionHasErrors('image');
    }



}
