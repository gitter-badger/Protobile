<?php
return [
    'demo_route' => [
        'host' => 'demo.example.com',
        'path' => '/demo/(:param)',
        'module' => 'Demo',
        'validator' => [
            'param' => '\\d+',
        ],
    ]
];
