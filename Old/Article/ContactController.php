<?php

namespace Old\Article;

use src\Controller\AbstractController;
use src\Service\MailService;

class ContactController extends AbstractController
{
    public function form()
    {
        return $this->twig->render("Contact/form.html.twig");
    }

    public function send()
    {
        $mail = new MailService();
        $mail->send(
            from: $_POST["mail"],
            to: "admin@cesiblog.fr",
            sujet: "Contact depuisle formulaire",
            html: $this->twig->render("Mailing/contact.html.twig",[
                "nom"=>$_POST["nom"],
                "message"=>$_POST["message"],
            ])
        );
        header("Location:/Contact/form");
    }
}