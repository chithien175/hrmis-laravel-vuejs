<?php

return [
    'role_structure'        => [
        'superadmin'        => [
            'dashboard'     => 'm',
            'blog'          => 'm',
            'menu'          => 'm',
            'company'       => 'm',
            'logs'          => 'm',
            'media'         => 'm'
        ],
        'admin'             => [
            'dashboard'     => 'm',
            'blog'          => 'm',
            'menu'          => 'm',
            'company'       => 'm',
            'media'         => 'm'
        ]
    ],
    'permission_structure'  => [],
    'permissions_map'       => [
        'm'                 => 'manage',
        'c'                 => 'create',
        'r'                 => 'read',
        'u'                 => 'update',
        'd'                 => 'delete'
    ]
];
