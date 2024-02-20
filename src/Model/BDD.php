<?php

namespace src\Model;

class BDD
{
    private static $instance = null;
    protected function __construct(){}
    protected function __clone(){}

    private static function initInstance() :void // Cette classe va nous permettre d'initialiser une seule connexion a la bdd, dans toute l'application
    {
        // Code de connexion
        $host = "coursphp-mariadb106";
        $username = "docker";
        $password = "docker";
        $dbname = "docker";
        $port = 3306;

        try{
            SELF::$instance = new \PDO(
                dsn: "mysql:host=".$host.";port=".$port.";dbname=".$dbname.";charset=utf8",
                username:$username,
                password: $password
            );
            SELF::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch (\Exception $e){
            die("Erreur = {$e->getMessage()}");
        }
    }

    public static function getInstance() : \PDO // on créé cette fonction, pr appeler l'instance a chaque fois, cela garanti qu'on a qu'une seule instance d'aller a chaque fois
    {
        if(SELF::$instance == null){
            SELF::initInstance();
        }
        return SELF::$instance;
    }
}