<?php
require("./inc/config.php");
require("./inc/header.php");
if($_POST){
    $requete = $bdd->prepare("SELECT * FROM articles WHERE Id= :Id OR Titre like :search");
    $requete->execute([
        "Id" => $_POST["search"],
        "search" => "%".$_POST["search"]."%",
    ]);
    $datas = $requete->fetchAll(PDO::FETCH_ASSOC);
}else{
    $requete = $bdd->query("SELECT * FROM articles");
    $datas = $requete->fetchAll(PDO::FETCH_ASSOC);
}

?>
    <h1>Bienvenue sur notre BLOG</h1>

    <form method="post">
        <input type="text" placeholder="Rechercher ..." name="search">
        <input type="hidden" value="1234" name="id">
    </form>


<?php   require("./inc/footer.php"); ?>