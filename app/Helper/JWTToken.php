<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Mockery\Exception;
use Firebase\JWT\key;

class JWTToken
{
    public static function createToken($userEmail,$userID):string
    {
        $key= env('JWT_KEY');
        $payload = [
            "iss" => 'dk_token',                        // issuer name
            "iat" => time(),                            // token issue time
            'exp' => time() + 60 * 60,                  // token issue time
            'userEmail' => $userEmail,
            'userID' => $userID
        ];
        return JWT::encode($payload, $key, "HS256");
    }
    public static function createTokenForPasswordReset($userEmail):string
    {
        $key= env('JWT_KEY');
        $payload = [
            "iss" => 'dk_token',
            "iat" => time(),
            'exp' => time() + 60 * 5,
            'userEmail' => $userEmail,
            'userID' => '0'
        ];
        return JWT::encode($payload, $key, "HS256");
    }
    public static function verifyToken($token):string|object
    {
        try {
                $key =env('JWT_KEY');
                $decode=JWT::decode($token,new Key($key,'HS256'));
                return $decode->userEmail;
        }
        catch (Exception $e){
            return 'unauthorized';
        }
    }

}
