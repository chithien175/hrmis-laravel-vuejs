<?php

return [
    'role_structure'        => [
        'superadmin'        => [
            'users'         => 'm',
            'acl'           => 'm',
            'company'       => 'm',
            'developer'     => 'm',
            'logs'          => 'm'
        ],
        'admin'             => [
            'users'         => 'm',
            'company'       => 'm'
        ],
        'user'              => [
        ],
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
