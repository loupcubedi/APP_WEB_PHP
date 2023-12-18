<?php

namespace src\Controller;

use src\Model\Article;

class AdminArticleController extends AbstractController
{

    //?controller=AdminArticle&action=list
    public function list()
    {
        // Requete SQL
        $articles = Article::SqlGetAll();
        // La vue
        return $this->twig->render("Admin/Article/list.html.twig",[
            "articles" => $articles
        ]);
    }

    public function delete(int $idArticle)
    {
        //Requete
        Article::SqlDelete($idArticle);
        // Rediriger la personne
        header("Location:/AdminArticle/list");
    }

    public function add()
    {
        if(isset($_POST["Titre"])){
            $sqlRepository = null;
            $nomImage = null;
            if(isset($_FILES["Image"]["name"])){
                $extensionsAutorisee = ["jpg", "jpeg", "png"];
                $extension = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
                if(in_array($extension, $extensionsAutorisee)){
                    // Créer réperoire date "2023/12"
                    $dateNow = new \DateTime();
                    $sqlRepository = $dateNow->format("Y/m");
                    $repository = "./uploads/images/{$sqlRepository}";
                    if(!is_dir($repository)){
                        mkdir($repository,0777,true);
                    }
                    // Renommer le fichier image
                    $nomImage = uniqid().".".$extension;

                    //Envoyer le fichier dans le bon répetoire
                    move_uploaded_file($_FILES["Image"]["tmp_name"], $repository."/".$nomImage);
                }
            }
            $article = new Article();
            $date = new \DateTime($_POST["DatePublication"]);
            $article->setTitre($_POST["Titre"])
                ->setDescription($_POST["Description"])
                ->setDatePublication($date)
                ->setAuteur($_POST["Auteur"])
                ->setImageRepository($sqlRepository)
                ->setImageFileName($nomImage);
            $id = Article::SqlAdd($article);
            header("Location:/Article/show/{$id}");
            exit();
        }else{
            return $this->twig->render("Admin/Article/add.html.twig");
        }

    }


    public function update(int $id)
    {
        $article = Article::SqlGetById($id);
        if(isset($_POST["Titre"])){
            $sqlRepository = (isset($_POST["ImageRepository"])) ? $_POST["ImageRepository"] : null;
            $nomImage = (isset($_POST["ImageFileName"])) ? $_POST["ImageFileName"] : null;

            if(isset($_FILES["Image"]["name"])){
                $extensionsAutorisee = ["jpg", "jpeg", "png"];
                $extension = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
                if(in_array($extension, $extensionsAutorisee)){
                    // Créer réperoire date "2023/12"
                    $dateNow = new \DateTime();
                    $sqlRepository = $dateNow->format("Y/m");
                    $repository = "./uploads/images/{$sqlRepository}";
                    if(!is_dir($repository)){
                        mkdir($repository,0777,true);
                    }
                    // Renommer le fichier image
                    $nomImage = uniqid().".".$extension;

                    //Envoyer le fichier dans le bon répetoire
                    move_uploaded_file($_FILES["Image"]["tmp_name"], $repository."/".$nomImage);
                }
                //Si il y'avait une image déjà en place on la vire :
                if(isset($_POST["ImageFileName"]) && $_POST["ImageFileName"] != '' && file_exists("{$_SERVER["DOCUMENT_ROOT"]}/uploads/images/{$_POST["ImageRepository"]}/{$_POST["ImageFileName"]}")){
                    unlink("{$_SERVER["DOCUMENT_ROOT"]}/uploads/images/{$_POST["ImageRepository"]}/{$_POST["ImageFileName"]}");
                }
            }

            $date = new \DateTime($_POST["DatePublication"]);
            $article->setTitre($_POST["Titre"])
                ->setDescription($_POST["Description"])
                ->setDatePublication($date)
                ->setAuteur($_POST["Auteur"])
                ->setImageRepository($sqlRepository)
                ->setImageFileName($nomImage);
            Article::SqlUpdate($article);
            header("Location:/Article/show/{$id}");
            exit();
        }else{
            return $this->twig->render("Admin/Article/update.html.twig",[
                "article" => $article
            ]);
        }

    }
}