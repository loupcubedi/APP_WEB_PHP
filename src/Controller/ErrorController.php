<?php

namespace src\Controller;

class ErrorController extends AbstractController
{
    public function showMessage(\Exception $e) :string // notre classe, qu'on appelle pr montrer le message d'erreur en cas de pb
    {
        return $this->twig->render("error.html.twig",[
            "code" => $e->getCode(),
            "message" => $e->getMessage()
        ]);
    }

}