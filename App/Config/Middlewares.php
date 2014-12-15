<?php
return [
    '\\Protobile\\Core\\Middlewares\\RequestManager' => [
        'priority' => 100,
    ],
    '\\Protobile\\Core\\Middlewares\\Router' => [
        'priority' => 400,
        'provides' => 'router',
    ],
    '\\Protobile\\Core\\Middlewares\\ModuleExecutor' => [
        'priority' => 300,
    ],
    '\\Protobile\\Core\\Middlewares\\AssetManager' => [
        'priority' => 500,
    ],
    '\\Protobile\\Core\\Middlewares\\ResponseManager' => [
        'priority' => 1000,
        'provides' => 'http_response',
    ],
];
