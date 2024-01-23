<?php

namespace src\Controller;

use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use src\Model\Article;
use src\Model\BDD;
use src\Model\DonDuSang;

class DonDuSangController  extends AbstractController
{
    public function index()
    {
        $donsDuSang = DonDuSang::SqlGetAll();
        return $this->twig->render("DonDuSang/index.html.twig", [
            "donsDuSang" => $donsDuSang
        ]);
    }

    public function apiGetAll()
    {
        $donsDuSang = DonDuSang::SqlGetAll();
        header('Content-Type: application/json');
        echo json_encode($donsDuSang);
        exit;
    }

}
