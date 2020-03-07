<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Frisk\Models\Issue;
use Frisk\Utils\IdentifierGenerator;
use Illuminate\Database\QueryException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\ErrorHandler\Error\OutOfMemoryError;

$factory->define(Issue::class, function (Faker $faker) {
    $exception = [
        [FatalThrowableError::class, 'Call to undefined method Illuminate\Auth\GenericUser::update()'],
        [OutOfMemoryError::class, 'Out of memory (allocated 262144) (tried to allocate 140189808036120 bytes)'],
        [QueryException::class, 'SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row']
    ][rand(0, 2)];

    $frame = [
        'line_number' =>  24,
        'method' => 'Composer',
        'file' => '/home/avicenna/www/mayl-project/app/Http/Controllers/HomeController.php'
    ];

    return [
        'exception' => $exception[0],
        'message' => $exception[1],
        'top_frame_hash' => IdentifierGenerator::forTopFrame($exception[0], $frame),
        'exception_hash' => IdentifierGenerator::forException($exception[0]),
        'last_seen' => now(),
        'group_by' => ['topFrame', 'exception'][rand(0, 1)]
    ];
});
