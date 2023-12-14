<?php

namespace src\Controller;

use src\Model\Article;

class AdminArticleController extends AbstractController
{
    public function list()
    {
        // Requete SQL
        $articles = Article::SqlGetAll();
        // La vue
        return $this->twig->render("Admin/Article/list.html.twig",[
            "articles" => $articles
        ]);
    }
}