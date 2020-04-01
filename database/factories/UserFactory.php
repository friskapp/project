<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Frisk\Models\User;
use Illuminate\Support\Str;

$currentLoop = 0;

$factory->define(User::class, function (Faker $faker) use (&$currentLoop) {
    $currentLoop++;
    return [
        'name' => $faker->name,
        'email' => $currentLoop === 1 ? 'test@test.com' : $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
