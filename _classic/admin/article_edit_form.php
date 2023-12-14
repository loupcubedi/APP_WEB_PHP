<?php
require("../inc/config.php");
if(isset($_GET["Id"])){
    $requete = $bdd->prepare("SELECT * FROM articles WHERE Id=:Id");
    $requete->execute([
            "Id" => $_GET["Id"]
    ]);
    $article = $requete->fetch(PDO::FETCH_ASSOC);
}else{
    header("Location:/admin");
}

require("../inc/header.php");
?>
    <h1>Partie admin > Modifier un article</h1>

<form method="post" action="/admin/article_edit_script.php">
    <input type="hidden" name="Id" value="<?php echo $article["Id"] ?>">
    <input type="text" name="Titre" value="<?php echo $article["Titre"] ?>">
    <textarea name="Description">
        <?php echo $article["Description"] ?>
    </textarea>
    <input type="date" name="DatePublication" value="<?php echo $article["DatePublication"] ?>">
    <select name="Auteur">
        <option
            value="Lukas"
            <?php echo ($article["Auteur"] == "Lukas") ? 'selected' : '' ?>
        >
            Lukas
        </option>
        <option value="Enzo" <?php echo ($article["Auteur"] == "Enzo") ? 'selected' : '' ?>>Enzo</option>
        <option value="Rémi" <?php echo ($article["Auteur"] == "Rémi") ? 'selected' : '' ?>>Rémi</option>
        <option value="Loup" <?php echo ($article["Auteur"] == "Loup") ? 'selected' : '' ?>>Loup</option>
        <option value="Bastien" <?php echo ($article["Auteur"] == "Bastien") ? 'selected' : '' ?>>Bastien</option>
        <option value="Kylian" <?php echo ($article["Auteur"] == "Kylian") ? 'selected' : '' ?>>Kylian</option>
    </select>
    <input type="submit">
</form>
<?php

$filePath = $article["ImageRepository"]."/".$article["ImageFileName"];

if($article["ImageRepository"] != "" && file_exists("../uploads/images/{$filePath}")){
    echo "<img src='/uploads/images/{$filePath}'>";
}
?>

<?php   require("../inc/footer.php"); ?>