<?php

namespace src\Controller;

use src\Model\User;

class UserController extends AbstractController
{
    public function create()
    {
        if(isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["roles"])){
            $user = new User();
            $hashpass = password_hash($_POST["password"], PASSWORD_BCRYPT, ["cost"=>12]);
            $user->setMail($_POST["mail"])
                ->setPassword($hashpass)
                ->setRoles($_POST["roles"]);
            $id = User::SqlAdd($user);
            header("Location:/User/login");
            exit();
        }else{
            return $this->twig->render("User/create.html.twig");
        }
    }

    public function login()
    {
        if(isset($_POST["mail"]) && isset($_POST["password"])){
            //Requete SQL qui va cherches les info du User avec le mail
            $user = User::SqlGetByMail($_POST["mail"]);
            if($user!=null){
                //Comparer le mdp hasché avec celui saisi dans le formulaire

            }else{
                throw new \Exception("Aucun user avec ce mail en base");
            }


            //Créer les sessions sinon Lever une Exception
            // Et rediriger vers /AdminArticle/list
        }else{
            return $this->twig->render("User/login.html.twig");
        }

    }
}