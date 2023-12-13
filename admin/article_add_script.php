<?php
require ("../inc/config.php");

$requete = $bdd->prepare("INSERT INTO articles (Titre, Description, DatePublication, Auteur) VALUES(:Titre, :Description,:DatePublication, :Auteur)");

$requete->execute([
    "Titre" => $_POST["Titre"],
    "Description" => $_POST["Description"],
    "DatePublication" => $_POST["DatePublication"],
    "Auteur" => $_POST["Auteur"],
]);

header("Location:/admin");
