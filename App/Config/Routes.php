<?php
return [
    'site' => [
        'hosts'  => ['protobile.dev'],
        'routes' => [
            'demo_route' => [
            'host'      => 'demo.example.com',
            'path'      => '/demo/(:param)',
            'module'    => 'Protobile\\Demo',
            'validator' => [
                'param' => '\\d+',
            ],
            ],
        ],
    ]
];
