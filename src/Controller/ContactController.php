<?php

namespace src\Controller;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    public function form()
    {
        return $this->twig->render("Contact/form.html.twig");
    }

    public function send()
    {
        $transport = Transport::fromDsn('smtp://3dd84281bc8679:8a9180301c670a@sandbox.smtp.mailtrap.io:2525');
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from($_POST["mail"])
            ->to('admin@cesiblog.fr')
            ->subject('Contact depuis le formulaire')
            ->html($this->twig->render("Mailing/contact.html.twig",[
                "nom" => $_POST["nom"],
                "message" =>$_POST["message"]
            ]));

        $mailer->send($email);
        header("Location:/Contact/form");
    }
}