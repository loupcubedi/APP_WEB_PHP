<?php

namespace src\Controller;

use src\Model\Article;

class ArticleController
{
    public function index()
    {
        $html="<h1>Bonjour voici les listes des 20 derniers articles</h1>";
        $articles = Article::SqlGetLast(20);
        foreach ($articles as $article){
            $html.="<p>{$article->getTitre()}</p>";
        }
        return $html;
    }
}