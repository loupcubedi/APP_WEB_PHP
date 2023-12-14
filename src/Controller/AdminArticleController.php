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
        header("Location:/?controller=AdminArticle&action=list");
    }
}