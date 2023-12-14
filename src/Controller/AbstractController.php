<?php

namespace src\Controller;

use Twig\Extension\DebugExtension;

abstract class AbstractController
{
    protected $twig;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER["DOCUMENT_ROOT"]."/../src/View");
        $this->twig = new \Twig\Environment($loader, [
            'cache' => $_SERVER["DOCUMENT_ROOT"]."/../var/cache",
            'debug' => true
        ]);
        $this->twig->addExtension(new DebugExtension());
    }
}