<?php
const _DBHOSTNAME_ = "cours_php-mariadb106";
const _DBUSERNAME_ = "docker";
const _DBPASSWORD_ = "docker";
const _DBNAME_ = "docker";
const _DBPORT_ = 3306;

try{
    $bdd = new PDO(
        dsn: "mysql:host="._DBHOSTNAME_.";port="._DBPORT_.";dbname="._DBNAME_.";charset=utf8",
        username: _DBUSERNAME_,
        password: _DBPASSWORD_
    );
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
    die("Erreur = {$e->getMessage()}");
}


function firstWords(int $count, string $sentence) :string
{
    preg_match('/^(\S+\s+){0,' . ($count - 1) . '}\S+/', $sentence, $matches);
    $resultat = $matches[0];
    return $resultat;

}



