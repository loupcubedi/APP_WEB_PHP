<?php
// Autoload de classe qui nous évite de faire des require à toutes les sauces
function chargerClasse($class)
{
    $ds = DIRECTORY_SEPARATOR;
    $dir = $_SERVER["DOCUMENT_ROOT"]."$ds..";
    //Remplacement des séparateurs Namespace
    $className = str_replace("\\",$ds,$class);
    $file = "{$dir}{$ds}{$className}.php";
    if(is_readable($file)){
        require_once $file;
    }
}
spl_autoload_register("chargerClasse");

$controller = new \src\Controller\ArticleController();
echo $controller->index();

