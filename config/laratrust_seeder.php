<?php

return [
    'role_structure'        => [
        'superadmin'        => [
            'company'       => 'm',
            'developer'     => 'm',
            'logs'          => 'm',
            'media'         => 'm'
        ],
        'admin'             => [
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
