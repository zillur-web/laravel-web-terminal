<?php

return [

    // Route prefix
    'prefix' => 'terminal',
    'middleware' => ['web'],

    // Allowed artisan commands
    'allowed_commands' => [
        'migrate',
        'cache:clear',
        'config:clear',
        'route:clear',
        'queue:restart',
    ],

    // Optional secret token for security (login-free access)
    'access_token' => env('WEB_TERMINAL_TOKEN', 'laravel-web-terminal'),

];