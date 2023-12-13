<?php
require("../inc/config.php");
require ("../inc/security.php");
if(!haveGoodRole(["Directeur"])){
    $_SESSION["ERROR"] = "Pas le bon role !";
    header("Location:/login.php");
    exit();
}
require("../inc/header.php");
if($_POST){
    $requete = $bdd->prepare("SELECT * FROM articles WHERE Id= :Id OR Titre like :search");
    $requete->execute([
        "Id" => $_POST["search"],
        "search" => "%".$_POST["search"]."%",
    ]);
    $articles = $requete->fetchAll(PDO::FETCH_ASSOC);
}else{
    $requete = $bdd->query("SELECT * FROM articles");
    $articles = $requete->fetchAll(PDO::FETCH_ASSOC);
}
?>
    <h1>Partie admin, liste des articles :</h1>
<form method="post">
    <input type="text" name="search" placeholder="Rechercher....">
</form>
    <!-- //Lister les articles pour la partie admin
//Dans le /admin/index Afficher une liste des articles sous forme de tableau (Id, Titre, DatePublication et Auteur uniquement)
//Prévoir 2 liens en attente href=# :
//-	1 Lien sur « Id » qui enverra sur la page de modification
//-	1 Lien « corbeille » qui enverra sur la page Delete
-->
    <table>
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">DatePublication</th>
            <th scope="col">Auteur</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach($articles as $article)
        {
            echo "<tr>";
            echo "<th scope='row'><a href='/admin/article_edit_form.php?Id={$article["Id"]}'>{$article["Id"]}</a></th>";
            echo "<td>{$article["Titre"]}</td>";
            echo "<td>{$article["DatePublication"]}</td>";
            echo "<td>{$article["Auteur"]}</td>";
            echo "<td><a href='/admin/article_delete_script.php?Id={$article["Id"]}'>&#128465;</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

<?php   require("../inc/footer.php"); ?>