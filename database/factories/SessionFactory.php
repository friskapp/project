<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Frisk\Models\Session;
use Frisk\Utils\IdentifierGenerator;

$testPayload = <<<CODE
{
    "notifier": "Laravel Client",
    "language": "PHP",
    "framework_version": "6.9.0",
    "language_version": "7.4.1",
    "exception_class": "Symfony\\Component\\Debug\\Exception\\FatalThrowableError",
    "seen_at": 1577248039,
    "message": "syntax error, unexpected 'return' (T_RETURN)",
    "glows": [],
    "solutions": [],
    "stacktrace": [
        {
            "line_number": 24,
            "method": "Composer\\Autoload\\includeFile",
            "class": null,
            "code_snippet": {
                "1": "<?php",
                "2": null,
                "3": "namespace App\\Http\\Controllers;",
                "4": null,
                "5": "class HomeController extends Controller",
                "6": "{",
                "7": "/**",
                "8": "* Create a new controller instance.",
                "9": "*",
                "10": "* @return void",
                "11": "*/",
                "12": "public function __construct()",
                "13": "{",
                "14": "// \$this->middleware('verified');",
                "15": "}",
                "16": null,
                "17": "/**",
                "18": "* Show the application dashboard.",
                "19": "*",
                "20": "* @return \\Illuminate\\Contracts\\Support\\Renderable",
                "21": "*/",
                "22": "public function index()",
                "23": "{d",
                "24": "return view('home');",
                "25": "}",
                "26": "}",
                "27": null
            },
            "file": "/home/abdumu/www/wennz/app/Http/Controllers/HomeController.php",
            "is_application_frame": true
        }
    ],
    "context": {
        "request": {
            "url": "http://wennz.test/",
            "ip": null,
            "method": "GET",
            "useragent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36"
        },
        "request_data": {
            "queryString": [],
            "body": [],
            "files": []
        },
        "headers": {
            "cookie": [
                "lang=eyJpdiI6ImFIb1hadW5zVWllb2MraEJBenJGNlE9PSIsInZhbHVlIjoib0tXcXB4TVpwbDdadFc3NDdyaXFzUT09IiwibWFjIjoiNmJkOTVlNjQxMTI4MDVhOTI0OWM1YjA5ZTg1NThjZmZkZTE1MmJkYTRmNjY1YzhjNjc4ZThlM2VjOTJiZjMwOSJ9; remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d=eyJpdiI6Ikpkak5PM3lOU3FjMFMyeFVRdklvcEE9PSIsInZhbHVlIjoic0MzUEd6RUlLRWFmREVFZVVKRHIyeG95cmh1cUs0WEZ1aG55YURXWWZKU1pSajVZVGt6Q1VKekNwaWg4UVFwN0F1N0orTStBVTZ1MythUDVwZ2ZBUzFsdkJBYXIza3ZNNnU2eCtsY0tJWGlEcWlzNkhaVGNyK0xrM2JrVHEwdkJ6VDB4SU9pN2pVZkZlU01leDBBVGhndFR6OWNPNld3cFl4QTJxc3I2SVBjPSIsIm1hYyI6IjU2OTM4Yzc4ODM3NDMzYTg5NDMyYmUxOGU2MTMzZjUzNDVhNWQ4NmE2ODQ1OTkwY2VjNDNmNTQzMTI0ZDIwZjMifQ%3D%3D"
            ],
            "accept-language": [
                "en-US,en;q=0.9,ar-SA;q=0.8,ar;q=0.7"
            ],
            "accept-encoding": [
                "gzip, deflate"
            ],
            "accept": [
                "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9"
            ],
            "user-agent": [
                "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36"
            ],
            "upgrade-insecure-requests": [
                "1"
            ],
            "dnt": [
                "1"
            ],
            "cache-control": [
                "no-cache"
            ],
            "pragma": [
                "no-cache"
            ],
            "connection": [
                "keep-alive"
            ],
            "host": [
                "wennz.test"
            ],
            "content-length": [
                null
            ],
            "content-type": [
                null
            ]
        },
        "cookies": {
            "lang": "eyJpdiI6ImFIb1hadW5zVWllb2MraEJBenJGNlE9PSIsInZhbHVlIjoib0tXcXB4TVpwbDdadFc3NDdyaXFzUT09IiwibWFjIjoiNmJkOTVlNjQxMTI4MDVhOTI0OWM1YjA5ZTg1NThjZmZkZTE1MmJkYTRmNjY1YzhjNjc4ZThlM2VjOTJiZjMwOSJ9",
            "remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d": "eyJpdiI6Ikpkak5PM3lOU3FjMFMyeFVRdklvcEE9PSIsInZhbHVlIjoic0MzUEd6RUlLRWFmREVFZVVKRHIyeG95cmh1cUs0WEZ1aG55YURXWWZKU1pSajVZVGt6Q1VKekNwaWg4UVFwN0F1N0orTStBVTZ1MythUDVwZ2ZBUzFsdkJBYXIza3ZNNnU2eCtsY0tJWGlEcWlzNkhaVGNyK0xrM2JrVHEwdkJ6VDB4SU9pN2pVZkZlU01leDBBVGhndFR6OWNPNld3cFl4QTJxc3I2SVBjPSIsIm1hYyI6IjU2OTM4Yzc4ODM3NDMzYTg5NDMyYmUxOGU2MTMzZjUzNDVhNWQ4NmE2ODQ1OTkwY2VjNDNmNTQzMTI0ZDIwZjMifQ=="
        },
        "session": [],
        "route": {
            "route": "home",
            "routeParameters": [],
            "controllerAction": "App\\Http\\Controllers\\HomeController@index",
            "middleware": []
        },
        "user": [],
        "env": {
            "laravel_version": "6.9.0",
            "laravel_locale": "en",
            "laravel_config_cached": false,
            "php_version": "7.4.1"
        },
        "logs": [],
        "dumps": [],
        "queries": [],
        "git": {
            "hash": "d45ae3ac50da901eb3adc6b4106c0c9979240fbe",
            "message": "fixes pageclean bug",
            "tag": null,
            "remote": "git@gitlab.com:awssat/wennz.git",
            "isDirty": true
        }
    },
    "stage": "local",
    "message_level": null,
    "open_frame_index": null,
    "group_by": "topFrame",
    "application_path": "/home/abdumu/www/wennz",
    "key": "6499c2d73c83d8834705c46af58079af"
}
CODE;

$factory->define(Session::class, function (Faker $faker) use($testPayload) {
    $testPayload = json_decode($testPayload, true);

    return [
        'stacktrace' => $testPayload['stacktrace'] ?? [],
        'message' => $testPayload['message'] ?? '',
        'context' => $testPayload['context'] ?? [],
        'glows' => $testPayload['glows'] ?? [],
        'framework_version' => ['6.9.0', '6.8.2', '5.0.3'][rand(0, 2)],
        'language_version' => ['7.4.1', '7.3.0', '7.2.2'][rand(0, 2)],
        'user_unique_identifier' => 'id:' . rand(1, 4),
        'stage' => 'local',
        'top_frame_hash' => IdentifierGenerator::forTopFrame($testPayload['exception_class'] ?? '', $testPayload['stacktrace'][0] ?? [] ?? []),
        'url' => $testPayload['context']['request']['url'] ?? null,
        'application_path' => $testPayload['application_path'] ?? null,
        'seen_at' => [true, false][rand(0, 1)] ? now()->subDays(rand(1, 60)) : now()->addDays(rand(1, 60)),
    ];
});
