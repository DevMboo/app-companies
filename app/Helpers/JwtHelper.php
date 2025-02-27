<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JwtHelper
{
    private static string $secretKey = "PROJETOL5NETWORKS"; // secret key como PROJETO L5 NETWORKS :)
    private static string $algorithm = 'HS256';
    private static int $tokenExpiration = 3600;

    public static function generateToken(array $data): string
    {
        $payload = [
            'iat' => time(),
            'exp' => time() + self::$tokenExpiration,
            'data' => $data
        ];

        return JWT::encode($payload, self::$secretKey, self::$algorithm);
    }

    public static function validateToken(string $token): object|false
    {
        try {
            return JWT::decode($token, new Key(self::$secretKey, self::$algorithm));
        } catch (Exception $e) {
            return false;
        }
    }
}
