<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
            'admins'=>'c,r,u,d',
            'tags'=>'c,r,u,d',
            'skills'=>'c,r,u,d',
            'playlists'=>'c,r,u,d',
            'videos'=>'c,r,u,d',
            'posts'=>'c,r,u,d',
            'categories'=>'c,r,u,d'
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
