<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(4),
        'description'=>$faker->paragraph(3),
        'serie_id'=> function (){
            return factory(\ App\Serie::class)->create()->id;
        },
        'video_id'=> 151390908,
        'episode_number'=> 100
    ];
});
