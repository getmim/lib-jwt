<?php
/**
 * Jwt
 * @package lib-jwt
 * @version 0.0.1
 */

namespace LibJwt\Library;

class Jwt
{

    private static $error;

    static function encode(array $data): ?string {
        $config = &\Mim::$app->config->libJwt;

        $params = [$data];

        if($config->algorithm === 'NONE')
            $config->algorithm = 'none';

        if($config->algorithm === 'none')
            $params[] = null;
        elseif(in_array($config->algorithm, ['HS256', 'HS384', 'HS512']))
            $params[] = $config->key;
        else
            $params[] = file_get_contents(BASEPATH . '/etc/cert/lib-jwt/private.pem');

        $params[] = $config->algorithm;

        $result = null;
        try{
            $result = call_user_func_array('jwt_encode', $params);
        }catch(\Exception $e){
            self::$error = $e->getMessage();
        }

        return $result;
    }

    static function decode(string $data, array $options=[]): ?array {
        $config = &\Mim::$app->config->libJwt;

        $params = [$data];

        if($config->algorithm === 'NONE')
            $config->algorithm = 'none';

        if($config->algorithm === 'none'){
            $params[] = null;
            $params[] = false;

        }else{
            if(in_array($config->algorithm, ['HS256', 'HS384', 'HS512']))
                $params[] = $config->key;
            else
                $params[] = file_get_contents(BASEPATH . '/etc/cert/lib-jwt/public.pem');

            $options['algorithm'] = $config->algorithm;
            $params[] = $options;
        }

        $result = null;

        try{
            $result = call_user_func_array('jwt_decode', $params);
        }catch(\Exception $e){
            self::$error = $e->getMessage();
        }

        return $result;
    }

    static function lastError(): ?string{
        return self::$error;
    }
}