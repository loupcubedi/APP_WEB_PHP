<?php

namespace src\Controller;

class UserController extends AbstractController
{

    public function create ()
    {
        if(isset($_POST["email"]) && isset)
        ($_POST["passowrd"] && isset($_POST["roles"])
        return $this->twig->render ( "User/create.html.twig");
    }
}