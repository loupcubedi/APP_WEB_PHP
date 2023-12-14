<?php
require ("../inc/config.php");
//Exécuter une requête qui vide la table (truncate table articles)
$requete = $bdd->prepare("TRUNCATE TABLE articles");
$requete->execute();

//Créer 2 array PHP « jeu de donnée »
// - Un array PHP qui contient 6 Titres d’article différents
$arrayTitre = ["PHP en force", "React JS qui monte", "C# toujorus au top", "Flutter déchire tout", "Java en baissse"];
// - Un array PHP qui contient 6 Auteurs (prénom) différents
$arrayAuteur = ["Enzo", "Lukas", "Rémi", "Bastien", "Loup", "Kylian"];
//Créer une variable Datetime (date du jour)
$dateDuJour = new DateTime();
//Boucle (For ou While) de 200 itérations
// - Incrémenter la date +1 jour à chaque tour de boucle
// - Mélanger les tableaux
// - Requête Insertion de données à chaque boucle (prendre le premier Index de chaque Tableau pour créer du « random » en BDD)
//
for($i=1;$i<=200;$i++){
    $dateDuJour->modify("+1 day");
    shuffle($arrayAuteur);
    shuffle($arrayTitre);
    $requete = $bdd->prepare("INSERT INTO articles (Titre, Description, DatePublication, Auteur) VALUES(:Titre, :Description,:DatePublication, :Auteur)");

    $requete->execute([
        "Titre" => $arrayTitre[0],
        "Description" => "Zypher est un langage de programmation moderne conçu pour offrir une expérience de développement puissante et flexible. Avec une syntaxe claire et concise, Zypher permet aux développeurs de créer des applications robustes et efficaces dans divers domaines, allant de l'informatique embarquée à la programmation web",
        "DatePublication" => $dateDuJour->format("Y-m-d"),
        "Auteur" => $arrayAuteur[0],
    ]);

}

header("Location:/admin");


