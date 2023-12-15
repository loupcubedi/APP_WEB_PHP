<?php

namespace src\Controller;

use src\Model\Article;

class ApiArticleController
{
    public function __construct()
    {
        header("Content-Type: application/json; charset=utf-8");
    }

    public function getAll()
    {
        if($_SERVER["REQUEST_METHOD"] != "GET"){
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode([
                "code" => 1,
                "Message" => "Get Attendu"
            ]);
        }
        $article = Article::SqlGetAll();
        return json_encode($article);

    }

    public function add()
    {
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode([
                "code" => 1,
                "Message" => "POST Attendu"
            ]);
        }
        //Récupération du body en String
        $data = file_get_contents("php://input");
        //Conversion du string en JSON
        $json = json_decode($data);

        if(empty($json)){
            header("HTTP/1.1 403 Forbiden");
            return json_encode([
                "code" => 1,
                "Message" => "Il faut des données"
            ]);
        }

        if(!isset($json->Titre) || !isset($json->Description)){
            header("HTTP/1.1 403 Forbiden");
            return json_encode([
                "code" => 1,
                "Message" => "Il faut des données"
            ]);
        }

        $article = new Article();
        $article->setTitre($json->Titre)
            ->setDescription($json->Description)
            ->setDatePublication(new \DateTime($json->DatePublication))
            ->setAuteur($json->Auteur);
        $id = Article::SqlAdd($article);
        return json_encode([
            "code" => 0,
            "Message" => "Article ajouté avec succès",
            "Id" => $id
        ]);
    }

}