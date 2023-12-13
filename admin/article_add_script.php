<?php
require ("../inc/config.php");

$requete = $bdd->prepare("INSERT INTO articles (Titre, Description, DatePublication, Auteur) VALUES(:Titre, :Description,:DatePublication, :Auteur)");

$requete->execute([
    "Titre" => "Mon troisième article",
    "Description" => "Ceci est mon troisième article",
    "DatePublication" => "2023-12-13",
    "Auteur" => "Rémi",
]);
