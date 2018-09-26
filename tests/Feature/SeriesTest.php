<?php

namespace Tests\Feature;

use App\Serie;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeriesTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_create_serie()
    {
        $this->Admin();

        Storage::fake(config('filesystems.default'));
        $this->post(route('serie.store'), [
            'title'=>'hello world',
            'description'=>'hello world bla bla',
            'image'=>UploadedFile::fake()->image('img.png')
        ])->assertRedirect();
        Storage::disk(config('filesystems.default'))->assertExists('public/series/'.str_slug('hello world').'.png');
        $this->assertDatabaseHas('series', ['slug'=>str_slug('hello world')]);
    }

    public function test_valide_title()
    {
        $this->Admin();
        Storage::fake(config('filesystems.default'));
        $this->post(route('serie.store'), [
            'description'=>'hello world bla bla',
            'image'=>UploadedFile::fake()->image('img.png')
        ])->assertSessionHasErrors('title');
    }

    public function test_valide_description()
    {
        $this->Admin();
        Storage::fake(config('filesystems.default'));
        $this->post(route('serie.store'), [
            'title'=>'hello world ',
            'image'=>UploadedFile::fake()->image('img.png')
        ])->assertSessionHasErrors('description');
    }

    public function test_valide_image()
    {
        $this->Admin();
        $this->post(route('serie.store'), [
            'title'=>'hello world',
            'description'=>'hello world bla bla',
        ])->assertSessionHasErrors('image');
    }

    public function test_valide_a_valid_image()
    {
        $this->Admin();
        Storage::fake(config('filesystems.default'));
        $this->post(route('serie.store'), [
            'title'=>'hello world',
            'description'=>'hello world bla bla',
            'image'=>UploadedFile::fake()->image('not_image')
        ])->assertSessionHasErrors('image');
    }


    public function test_only_admin_can_create_a_serie()
    {
        Storage::fake(config('filesystems.default'));

        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->post(route('serie.store'), [
            'title'=>'hello world',
            'description'=>'hello world bla bla',
            'image'=>UploadedFile::fake()->image('not_image')
        ])->assertSessionHas('error', 'you are not admin');
    }

    public function test_admin_can_update_serie()
    {
        $this->Admin();
        Storage::fake(config('filesystems.default'));
        $serie = factory(Serie::class)->create();
        $data = [
            'title'=>'hello world',
            'description'=>'loerm ipsum emit',
            'image'=>UploadedFile::fake()->image('hello.png')
         ];
        $this->put(route('serie.update', $serie->slug), $data)
             ->assertRedirect()
             ->assertSessionHas('success', 'updated');
        $serie = $serie->fresh();
        $this->assertEquals($data['title'], $serie->title);
        $this->assertEquals($data['description'], $serie->description);
        Storage::disk(config('filesystems.default'))
             ->assertExists('public/series/'.str_slug($serie->title).'.png');
        $this->assertDatabaseHas('series', ['slug'=>$serie->slug,'image'=>$serie->image]);
    }


}
