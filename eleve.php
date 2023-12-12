<?php
require("./inc/config.php");
require("./inc/header.php");
?>
<?php
echo "<p>Bonjour {$_GET["nom"]} ta note est {$_GET["note"]}</p>";
?>



<?php
require("./inc/footer.php");
?>
