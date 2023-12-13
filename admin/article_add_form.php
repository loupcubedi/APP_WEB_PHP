<?php
require("../inc/config.php");
require("../inc/header.php");
?>
    <h1>Partie admin > Ajouter un article</h1>

<form method="post" action="/admin/article_add_script.php">
    <input type="text" name="Titre">
    <textarea name="Description"></textarea>
    <input type="date" name="DatePublication">
    <select name="Auteur">
        <option value="Lukas">Lukas</option>
        <option value="Enzo">Enzo</option>
        <option value="Jules">Jules</option>
        <option value="Loup">Loup</option>
    </select>
    <input type="submit">
</form>

<?php   require("../inc/footer.php"); ?>