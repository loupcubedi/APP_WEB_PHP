<?php

namespace src\Service;

use Firebase\JWT\JWT;
use Laminas\Stdlib\DateTime;

class JwtService
{
    public static String $secretKey = "toto";

    public static function createToken(array $datas): String
    {
        $issueAt = new \DateTime();
        $expire = new \DateTime();
        $expire->modify("+6 minutes");
        $serverName = "cesi.local";
        $data = [
            "iat" => $issueAt->getTimestamp(),
            "iss" => $serverName,
            "nbf" => $issueAt->getTimestamp(),
            "exp" => $expire->getTimestamp(),
            "datas" => $datas
        ];

        $jwt = JWT::encode($data,self::$secretKey,"HS512");

        return $jwt;
    }

}