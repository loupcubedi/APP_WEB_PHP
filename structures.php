<?php
$bool = false;
$age = 22;
$ville = "Paris";

if($bool){
    echo "<p>bool est à true</p>";
}elseif ($age >= 13 && ($ville == "Paris" || $ville == "Lille")){
    echo "<p>Plus de 13 ans et habite Paris ou Lille</p>";
}else{
    echo "<p>Rien de tout ça</p>";
}

if($age >= 18){
    $statut = "Majeur";
}else{
    $statut = "Mineur";
}
// Equivaut en ternaire :
$statut = ($age >=18) ? "Majeur" : "Mineur";
var_dump($statut);
// SWITCH CASE
$note = -1;
switch ($note){
    case 0:
        echo "Tu es nul";
        break;
    case ($note > 0 AND $note <=5):
        echo "Pas terrible";
        break;
    case $note >5:
        echo "Bien";
        break;
    default:
        echo "Désolé je n'ai pas de message";
}

/*
$nbLignes = 1;
while ($nbLignes <= 100){
    echo "<p>Ligne N° {$nbLignes}</p>";
    $nbLignes++;
    if($nbLignes == 88){
        break;
    }
}
*/
function parler(string $prenom, int $age) :string
{
    $phrase = "<p>Tu sais qui c'est {$prenom} ?<br> il a {$age} ans</p>";
    return $phrase;
}
echo parler(age: 21, prenom: "Bruno");
/*
 * Faire une fonction qui converti les °C en °F

Pour convertir en degrés Celsius une température donnée en degrés Fahrenheit, il suffit de soustraire 32 et de diviser par 1,8 (9/5 = 1,8) le nombre ainsi obtenu. Pour 50 °F , on obtient : 50 − 32 = 18, puis 18/1,8 = 10 ; donc 50 °F = 10 °C .

Ensuite adapter la fonction pour qu’elle puisse convertir un degré (Fahrenheit, Celsius) en un autre (Fahrenheit, Celsius). Attention vous devez mettre en place vos talents de programmeur pour créer une fonction dont la signature (paramètres d’entrés et type de sortie) ne puisse plus bouger dans le temps. De telle sorte que plus tard on puisse ajouter les « Kelvin » dans le système

 */
