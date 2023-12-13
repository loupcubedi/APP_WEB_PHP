<?php
require("./inc/config.php");
require("./inc/header.php");
if($_POST){
    $requete = $bdd->query("SELECT * FROM articles WHERE Id={$_POST["search"]}");
}else{
    $requete = $bdd->query("SELECT * FROM articles");
}
$datas = $requete->fetchAll(PDO::FETCH_ASSOC);
var_dump($datas);
echo $datas[0]["Titre"];
?>
<h1>Bienvenue sur notre BLOG</h1>

<form method="post">
    <input type="text" placeholder="Rechercher ..." name="search">
    <input type="hidden" value="1234" name="id">
</form>


<?php   require("./inc/footer.php"); ?>