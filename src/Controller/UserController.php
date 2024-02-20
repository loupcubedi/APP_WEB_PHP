<?php

namespace src\Controller;

use src\Model\User;
use src\Service\JwtService;

class UserController extends AbstractController
{
    public function create() // ici notre fonction pr créer un utilisateur
    {
        if(isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["roles"])){
            $user = new User();
            $hashpass = password_hash($_POST["password"], PASSWORD_BCRYPT, ["cost"=>12]);
            $user->setMail($_POST["mail"])
                ->setPassword($hashpass)
                ->setRoles($_POST["roles"]);
            $id = User::SqlAdd($user); // on l'ajoute ensuite en BDD
            header("Location:/User/login");
            exit();
        }else{
            return $this->twig->render("User/create.html.twig");
        }
    }

    public function login() // Fonction d'identification, si l'authentification est faite, on créé une session de connexion
    {
        if(isset($_POST["mail"]) && isset($_POST["password"])){
            $user = User::SqlGetByMail($_POST["mail"]);
            if($user!=null){
                if(password_verify($_POST["password"], $user->getPassword())){
                    $_SESSION["login"] = [
                        "Email" => $user->getMail(),
                        "Roles" => $user->getRoles()
                    ];
                    header("Location:/AdminDonDuSang/list");
                }else{
                    throw new \Exception("Mot de passe incorrect pour {$_POST["mail"]}");
                }
            }else{
                throw new \Exception("Aucun user avec ce mail en base");
            }

        }else{
            return $this->twig->render("User/login.html.twig");
        }
    }

    public static function haveGoodRole(array $rolesCompatibles) { // Cette fonction va checker dans un premier temps si on est connecté, si oui, elle va check notre role
        if(!isset($_SESSION["login"])){
            throw new \Exception("Vous devez vous authentifier pour accéder à cette page");
        }
        $roleFound = false;
        foreach ($_SESSION["login"]["Roles"] as $role){
            if(in_array($role, $rolesCompatibles)){
                $roleFound = true;
                break;
            }
        }
        if(!$roleFound){
            throw new \Exception("Vous dn'avez pas le bon role pour accéder à cette page");
        }
    }

    public function logout() // On ferme la session
    {
        unset($_SESSION["login"]);
        header("Location:/");
    }

    //Route qu'on va appeler par API
    public function loginjwt() // Ici, notre fonction va checker si notre mail & notre mdp sont bien en bdd, si oui, on va pouvoir generer un jwt
    {
        header("Content-Type: application/json; charset=utf-8");
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode([
                "code" => 1,
                "Message" => "POST Attendu"
            ]);
        }

        $data = file_get_contents("php://input");
        $json = json_decode($data);

        if(empty($json)){
            header("HTTP/1.1 403 Forbiden");
            return json_encode([
                "code" => 1,
                "Message" => "Il faut des données"
            ]);
        }

        if(!isset($json->mail) || !isset($json->password)){
            header("HTTP/1.1 403 Forbiden");
            return json_encode([
                "code" => 1,
                "Message" => "Il manque le mail ou le password"
            ]);
        }
        $user = User::SqlGetByMail($json->mail);
        if($user == null){
            header("HTTP/1.1 403 Forbiden");
            return json_encode([
                "code" => 1,
                "Message" => "User inexistant"
            ]);
        }
        if(!password_verify($json->password, $user->getPassword())){
            header("HTTP/1.1 403 Forbiden");
            return json_encode([
                "code" => 1,
                "Message" => "Mot de passe invalide"
            ]);
        }

        // Retourne JWT
        return JwtService::createToken([
            "mail" => $user->getMail(),
            "roles" => $user->getRoles()
        ]);
    }


}