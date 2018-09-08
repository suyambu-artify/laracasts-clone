<?php

namespace Tests\Unit;

use App\Serie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImagepathTest extends TestCase
{

    use RefreshDatabase;

    public function test_image_path_fo_image(){
        $serie = factory(Serie::class)->create(['image'=>'series/img.png']);
        $image_path =$serie->image_path;
        $this->assertEquals(asset('storage/series/img.png'),$image_path);
    }
}
