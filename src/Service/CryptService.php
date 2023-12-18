<?php

namespace src\Service;

class CryptService
{
    private static $encryp_method = "aes-128-ctr";
    private static $key = "bonjour";
    private static $secret_iv = "coucou";

    public static function encrypt(String $data):?String
    {
        $key = hash("sha256", self::$key);
        $iv = substr(hash("sha256", self::$secret_iv),0,16);
        $output = openssl_encrypt($data,self::$encryp_method,$key,0,$iv);
        return base64_encode($output);
    }

    public static function decrypt(String $data):?String
    {
        $key = hash("sha256", self::$key);
        $iv = substr(hash("sha256", self::$secret_iv),0,16);
        $output = openssl_decrypt(base64_decode($data),self::$encryp_method,$key,0,$iv);
        return $output;
    }
}