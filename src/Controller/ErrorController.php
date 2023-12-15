<?php

namespace src\Controller;

use src\Model\Article;
use src\Model\BDD;


class ErrorController {
public function handleException($exception) {
echo 'Erreur rencontrée : ' . $exception->getMessage();
}
}
