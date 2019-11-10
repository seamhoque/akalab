<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'type'=>$faker->mimeType,
        'published_at'=>$faker->dateTime,
        'name'=>$faker->name,
        'question'=>$faker->title,
        'description'=>$faker->text,
    ];
});
