<?php

return [
    'prefix' => 'terminal',
    'middleware' => ['web', 'auth'],
    'allowed_commands' => [
        'migrate',
        'cache:clear',
        'config:clear',
        'route:clear',
        'queue:restart',
    ],

];
