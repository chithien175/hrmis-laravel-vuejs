<?php

return [
    'role_structure'        => [
        'superadmin'        => [
            'dashboard'     => 'm',
            'blog'          => 'm',
            'page'          => 'm',
            'menu'          => 'm',
            'company'       => 'm',
            'logs'          => 'm',
            'media'         => 'm',
            'ecommerce'     => 'm'
        ],
        'admin'             => [
            'dashboard'     => 'm',
            'blog'          => 'm',
            'page'          => 'm',
            'menu'          => 'm',
            'company'       => 'm',
            'media'         => 'm',
            'ecommerce'     => 'm'
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
