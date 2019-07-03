<?php

return [
    'role_structure' => [
        'superadmin' => [
            'users' => 'm',
            'acl' => 'm'
        ],
        'admin' => [
            'users' => 'm'
        ],
        'user' => [
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'm' => 'manage',
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
