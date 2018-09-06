<?php

return [
    '__name' => 'lib-jwt',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-jwt.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-jwt' => ['install','update','remove'],
        'etc/cert/lib-jwt' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [],
        'optional' => []
    ],
    '__gitignore' => [
        'etc/cert/lib-jwt/*' => true,
        '!etc/cert/lib-jwt/.gitkeep' => true
    ],
    'autoload' => [
        'classes' => [
            'LibJwt\\Server' => [
                'type' => 'file',
                'base' => 'modules/lib-jwt/server'
            ],
            'LibJwt\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-jwt/library'
            ]
        ],
        'files' => []
    ],
    'server' => [
        'lib-jwt' => [
            'PHP-JWT' => 'LibJwt\\Server\\PHP::jwt'
        ]
    ],

    'libJwt' => [
        'algorithm' => 'NONE'
    ]
];