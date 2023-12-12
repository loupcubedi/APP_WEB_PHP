<h1>Coucou</h1>
<?php
$a = false;
$b = 12;
$c = 12.5;
$chaine = "Ceci est une chaine de caractère";

echo "<p>".$chaine."</p>";

echo "<p>Bonjour voici la valeur de la variable chaine : {$chaine}</p>";

echo "<p class=\"title\">La valeur est $chaine</p>";

echo '<p>La valeur est $chaine</p>';
//TAbleau 1 dimension indice/valeur
$arrayHomme = array("Brice", "Loup", "Antoine", "Jules", 12);
$arrayFemme = ["Marion", "Sylvie", "Chantal"];
var_dump($arrayHomme);
echo "<p>{$arrayHomme[2]}</p>";
$arrayHomme[] = "Lukas";
var_dump($arrayHomme);

// Tableau 1 dimension clef/valeur
$arrayFruits = [
   "F" => "Fraise",
   "A" => "Abricot",
   "P" => "Pomme"
];
var_dump($arrayFruits);
echo "<p>{$arrayFruits["F"]}</p>";
$arrayFruits["k"] = "Kiwi";
var_dump($arrayFruits);

foreach ($arrayFruits as $index => $fruit){
    echo "<li>Le fruit /{$index}/ est {$fruit}</li>";
}
/* Exercice :  Créer un tableau $mois :
- Clef = Nom du mois
- Valeur = nb jour du mois

Faire une boucle qui affiche les mois et leur valeur dans un tableau HTML (<table>)
*/
$mois = [
        "Janvier" => 31,
        "Février" => 28,
        "Mars" => 31,
        "Avril" => 30,
        "Mai" => 31,
        "Juin" => 30,
        "Juillet" => 31,
        "Aout" => 31,
        "Septembre" => 30,
        "Octobre" => 31,
        "Novembre" => 30,
        "Décembre" => 31,
]
?>
<table border="1">
    <thead>
    <tr>
        <td>Mois</td>
        <td>Nb Jour</td>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($mois as $month => $nbDays){
            echo"<tr>
            <td>{$month}</td>
            <td>{$nbDays}</td>
        </tr>";
        }
        ?>
    </tbody>
</table>