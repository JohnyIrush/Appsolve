<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=> $faker->text(30),
        'image'=> $faker->text(5),
        'Seo'=> $faker->text(150),
        'post'=> $faker->text(2500),
    ];
});
