<?php
require ("../inc/config.php");

$sqlRepository = null;
$nomImage = null;
if(isset($_FILES["Image"]["name"])){
    $extensionsAutorisee = ["jpg", "jpeg", "png"];
    $extension = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
    if(in_array($extension, $extensionsAutorisee)){
        // Créer réperoire date "2023/12"
        $dateNow = new DateTime();
        $sqlRepository = $dateNow->format("Y/m");
        $repository = "../uploads/images/{$sqlRepository}";
        if(!is_dir($repository)){
            mkdir($repository,0777,true);
        }
        // Renommer le fichier image
        $nomImage = uniqid().".".$extension;

        //Envoyer le fichier dans le bon répetoire
        move_uploaded_file($_FILES["Image"]["tmp_name"], $repository."/".$nomImage);
    }
}


$requete = $bdd->prepare("INSERT INTO articles (Titre, Description, DatePublication, Auteur, ImageRepository, ImageFilename) VALUES(:Titre, :Description,:DatePublication, :Auteur, :ImageRepository, :ImageFilename)");

$requete->execute([
    "Titre" => $_POST["Titre"],
    "Description" => $_POST["Description"],
    "DatePublication" => $_POST["DatePublication"],
    "Auteur" => $_POST["Auteur"],
    "ImageRepository" => $sqlRepository,
    "ImageFilename" => $nomImage,
]);

header("Location:/admin");
