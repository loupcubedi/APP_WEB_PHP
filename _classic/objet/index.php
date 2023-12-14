<?php
require ("../inc/config.php");
require ("./Article.php");
use objet\Article;

$article = new Article();
$article->setTitre("Mon titre");
$article->setDatePublication(new \DateTime());
Article::SqlAdd($bdd, $article);
var_dump($article);

$article2 = new Article();
$article2->setTitre("Mon titre 2");
var_dump($article2);

$article3 = $article; // C'est un pointeur
$article3->setTitre("Mon titre 3");
var_dump($article3);
var_dump($article);