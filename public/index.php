<?php
require_once "../vendor/autoload.php";
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
//Routeur
$controller = (isset($_GET["controller"])) ? $_GET["controller"] : '';
$action = (isset($_GET["action"])) ? $_GET["action"] : '';
$param = (isset($_GET["param"])) ? $_GET["param"] : '';

if($controller != ''){
    try{
        $class = "src\Controller\\".$controller."Controller";
        //src\Controller\ArticleController
        if(class_exists($class)){
            $controller = new $class;
            if(method_exists($class,$action)){
                echo $controller->$action($param);
            }else{
                throw new Exception("Méthode $action inexistante dans $class");
            }
        }else{
            throw new Exception("Controller $class inexistant");
        }
    }catch (Exception $e){
        // On verra plus tard pour faire un ErrorController
        echo $e->getMessage();
    }
}else{
    $controller = new \src\Controller\ArticleController();
    echo $controller->index();
}

