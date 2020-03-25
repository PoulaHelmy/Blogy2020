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
        'admin' => [
            'profile' => 'r,u',
            'tags'=>'c,r,u',
            'skills'=>'c,r,u',
            'playlists'=>'c,r,u',
            'videos'=>'c,r,u',
            'posts'=>'c,r,u',
            'categories'=>'c,r,u'
          ],
        'user' => [
            'profile' => 'r,u',
            'tags'=>'r',
            'skills'=>'r',
            'playlists'=>'r',
            'videos'=>'r',
            'posts'=>'r',
            'categories'=>'r'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
