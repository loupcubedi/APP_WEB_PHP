<?php
require("../inc/config.php");
require("../inc/header.php");

$requete = $bdd->query('SELECT * FROM articles ');
$articles = $requete->fetchALL(PDO::FETCH_ASSOC);

?>
    <h1>Partie admin, liste des articles :</h1>
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
            echo "<th scope='row'><a href='#'>{$article["Id"]}</a></th>";
            echo "<td>{$article["Titre"]}</td>";
            echo "<td>{$article["DatePublication"]}</td>";
            echo "<td>{$article["Auteur"]}</td>";
            echo "<td><a href='#'>&#128465;</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

<?php   require("../inc/footer.php"); ?>