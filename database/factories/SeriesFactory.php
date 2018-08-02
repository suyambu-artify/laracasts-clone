<?php

use Faker\Generator as Faker;

$factory->define(App\Serie::class, function (Faker $faker) {

    $title = $faker->sentence(5);

    return [
        'title'=>$title,
        'slug'=>str_slug($title),
        'image'=>$faker->imageUrl(),
        'description'=>$faker->paragraph(5)
    ];
});
