<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {

    $name = $faker->unique()->firstNameMale;

    return [
        'name' => ucfirst($name),
        'slug' => Str::slug($name),
        'status' => $faker->randomElement($array = array ('0','1'))
    ];
});
