<?php

return [
    'role_structure'        => [
        'superadmin'        => [
            'blog'          => 'm',
            'company'       => 'm',
            'logs'          => 'm',
            'media'         => 'm'
        ],
        'admin'             => [
            'blog'          => 'm',
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
