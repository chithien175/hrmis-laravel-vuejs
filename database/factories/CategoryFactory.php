<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Category::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = str_slug($title, '-');
    return [
        'name'          => $title,
        'slug'          => $slug,
        'parent_id'     => 0,
        'created_at'    => Carbon::now()
    ];
});