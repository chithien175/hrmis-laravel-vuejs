<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = str_slug($title, '-');
    return [
        'title'         => $title,
        'slug'          => $slug,
        'photo'         => 'post-image-default.jpg',
        'body'          => $faker->paragraph,
        'publish'       => 'publish',
        'counter'        => 0,
        'user_id'       => 1,
        'created_at'    => Carbon::now()
    ];
});