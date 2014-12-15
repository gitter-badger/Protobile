<?php
return [
    'demo_route' => [
        'path'       => '/sub_path/(:optional_param)',
        'controller' => 'Index:action',
        'validator'  => [
            'optional_param' => '\\d+',
        ],
        'view'    => 'list',
        'layout'  => 'custom',
        'methods' => ['GET'],
    ],
    'demo_route' => [
        'path'       => '/sub_path/:param',
        'controller' => 'Index:action',
        'validator'  => [
            'param' => '\\d+',
        ],
        'view'    => 'item',
        'methods' => ['GET','POST'],
    ]
];
