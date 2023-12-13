<?php
require ("../inc/config.php");

$requete = $bdd->prepare("UPDATE articles SET Titre=:Titre, Description=:Description, DatePublication=:DatePublication, Auteur=:Auteur WHERE Id=:Id");

$requete->execute([
    "Titre" => $_POST["Titre"],
    "Description" => $_POST["Description"],
    "DatePublication" => $_POST["DatePublication"],
    "Auteur" => $_POST["Auteur"],
    "Id" => $_POST["Id"], //Champ Hidden du formulaire
]);

header("Location:/admin/article_edit_form.php?Id={$_POST["Id"]}");
