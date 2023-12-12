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

function convertirDegre(float $degres, $from, $to) :float
{
    switch ($to){
        case "C":
            $result =  ($degres - 32 )/ 1.8 ;
            break;
        case "F":
            $result = $degres * 1.8 + 32;
            break;
    }


    return $result;
}
$cel = 36;
$result = convertirDegre($cel, "F");
echo "<p>{$cel}°C = {$result}°F</p>";
$result = convertirDegre(96.8, "C");
echo "<p>96.8°F = {$result}°C</p>";