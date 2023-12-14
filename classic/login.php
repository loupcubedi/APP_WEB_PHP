<?php
require("./inc/config.php");
require("./inc/header.php");
?>
    <h1>LOGIN</h1>
<?php

if(isset($_SESSION["ERROR"])){
    echo "<p style='color: red'>{$_SESSION["ERROR"]}</p>";
    unset($_SESSION["ERROR"]);
}
?>
    <form method="post" action="login_check.php">
        <input type="email" name="Email">
        <input type="password" name="Password">
        <input type="submit">
    </form>


<?php   require("./inc/footer.php"); ?>