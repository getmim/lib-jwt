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
        'modules/lib-jwt' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibJwt\\Server' => [
                'type' => 'file',
                'base' => 'modules/lib-jwt/server'
            ]
        ],
        'files' => []
    ],
    'server' => [
        'lib-jwt' => [
            'PHP-JWT' => 'LibJwt\\Server\\PHP::jwt'
        ]
    ]
];