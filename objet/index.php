<?php
require ("./Article.php");
$article = new Article();
$article->setTitre("Mon titre");
var_dump($article);

$article2 = new Article();
$article2->setTitre("Mon titre 2");
var_dump($article2);

$article3 = $article;
$article3->setTitre("Mon titre 3");
var_dump($article3);
var_dump($article);