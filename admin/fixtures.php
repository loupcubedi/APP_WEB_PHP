<?php
require("../inc/config.php");

$db = $bdd;

$request = $db->exec("TRUNCATE TABLE articles");

$titres = ['Salut la team', 'Streamez kekra', 'FC KEKRA', 'Libérer lacrim', 'ouhi ouhahaha', 'chang chang'];
$auteurs = ['Loup', 'Quentin', 'Evan', 'Bastien', 'Jules', 'Papate'];

$date = new DateTime();

for ($i = 0; $i < 200; $i++) {
    $dateString = $date->format('Y-m-d');
    $date->modify('+1 day');
    shuffle($titres);
    shuffle($auteurs);

    $stmt = $db->prepare("INSERT INTO articles (titre, auteur, DatePublication) VALUES (?, ?, ?)");
    $stmt->execute([$titres[0], $auteurs[0], $dateString]);
}

$stmt = $db->query("SELECT id, titre, DatePublication, auteur FROM articles");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>"; // Début du tableau
foreach ($articles as $article) {
    echo "<tr>";
    echo "<td>{$article['id']}</td>";
    echo "<td>{$article['titre']}</td>";
    echo "<td>{$article['DatePublication']}</td>";
    echo "<td>{$article['auteur']}</td>";
    echo "<td style='text-align: right;'>";
    echo "<a href='modifier.php?id={$article['id']}'><button>Modifier</button></a>";
    echo "<a href='supprimer.php?id={$article['id']}'><button>Corbeille</button></a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>"; // Fin du tableau
?>
