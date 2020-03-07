<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Frisk\Session;
use Frisk\Utils\IdentifierGenerator;

$factory->define(Session::class, function (Faker $faker) {
    $payload = json_decode(file_get_contents(__DIR__.'/../../test.json'), true);

    return [
        'stacktrace' => $payload['stacktrace'],
        'message' => $payload['message'],
        'context' => $payload['context'],
        'glows' => $payload['glows'],
        'framework_version' => ['6.9.0', '6.8.2', '5.0.3'][rand(0, 2)],
        'language_version' => ['7.4.1', '7.3.0', '7.2.2'][rand(0, 2)],
        'user_unique_identifier' => 'id:' . rand(1, 4),
        'stage' => 'local',
        'top_frame_hash' => IdentifierGenerator::forTopFrame($payload['exception_class'], $payload['stacktrace'][0] ?? []),
        'url' => $payload['context']['request']['url'] ?? null,
        'application_path' => $payload['application_path'],
        'seen_at' => [true, false][rand(0, 1)] ? now()->subDays(rand(1, 60)) : now()->addDays(rand(1, 60)),
    ];
});
