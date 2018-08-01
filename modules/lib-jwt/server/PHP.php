<?php
/**
 * JWT tester
 * @package lib-jwt
 * @version 0.0.1
 */

namespace LibJwt\Server;

class PHP
{
    static function jwt(){
        return [
            'success' => function_exists('jwt_encode'),
            'info' => 'https://github.com/cdoco/php-jwt'
        ];
    }
}