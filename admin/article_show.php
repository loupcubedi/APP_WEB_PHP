<?php
require("../inc/config.php");
require("../inc/header.php");
?>
    <h1>Partie admin > Détail de l'article</h1>

<p><strong>Titre : </strong> <?php echo $_POST["Titre"] ?></p>
<p><strong>Description : </strong> <?php echo $_POST["Description"] ?></p>
<p><strong>Date de Publication : </strong> <?php echo $_POST["DatePublication"] ?></p>
<p><strong>Auteur : </strong> <?php echo $_POST["Auteur"] ?></p>

<?php   require("../inc/footer.php"); ?>