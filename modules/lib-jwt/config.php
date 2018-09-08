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
    '__inject' => [
        [
            'name' => 'libJwt',
            'children' => [
                [
                    'name' => 'algorithm',
                    'question' => 'JWT Algorithm',
                    'rules' => '!^.+$!',
                    'default' => 'HS256',
                    'options' => [
                        'HS256' => 'HMAC - HS256',
                        'HS384' => 'HMAC - HS384',
                        'HS512' => 'HMAC - HS512',
                        'RS256' => 'RSA - RS256',
                        'RS384' => 'RSA - RS384',
                        'RS512' => 'RSA - RS512',
                        'ES256' => 'ECDSA - ES256',
                        'ES384' => 'ECDSA - ES384',
                        'ES512' => 'ECDSA - ES512'
                    ]
                ],
                [
                    'name' => 'key',
                    'question' => 'Algorithm Key ( For HMAC Only )',
                    'rule' => '!^.*$!'
                ]
            ]
        ]
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