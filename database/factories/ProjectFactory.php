<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Frisk\Models\Project;
use Illuminate\Support\Str;

$factory->define(Project::class, function (Faker $faker) {
    $projectName = $faker->city;
    return [
        'title' => $projectName,
        'slug' => Str::slug($projectName),
        'key' => $faker->md5,
        'url' => $faker->url
    ];
});
