<?php
require("./inc/config.php");
require("./inc/header.php");
?>
<h1>Bienvenue sur notre BLOG</h1>
<ul>
    <li><a href="eleve.php?nom=Enzo&note=A">Enzo</a></li>
    <li><a href="eleve.php?nom=Bastien&note=C">Bastien</a></li>
    <li><a href="eleve.php?nom=Evan&note=A">Evan</a></li>
    <li><a href="eleve.php?nom=Raphael&note=B">Raphael</a></li>
</ul>
<form method="post" action="submitform.php">
    <input type="text" placeholder="Rechercher ..." name="search">
    <input type="hidden" value="1234" name="id">
</form>

    <form method="post">
        <input type="text" name="prenom">
        <input type="text" name="nom">
        <input type="date" name="naissance">
        <input type="submit">
    </form>


<?php   require("./inc/footer.php"); ?>