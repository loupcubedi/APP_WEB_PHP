<?php

namespace src\Controller;

use Mpdf\Mpdf;
use src\Model\DonDuSang;

class DonDuSangController  extends AbstractController
{
    public function index() //Ici la fonction index, pr getall mes données pr ma page de carte avec les dons du sang affichés
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

    public function pdf(int $id) // ici , la fonction pr générer le pdf
    {
        $donDuSang = DonDuSang::SqlGetById($id);

        $mpdf = new Mpdf([
            "tempDir" => $_SERVER["DOCUMENT_ROOT"]."/../var/cache/pdf" // On définit le chemin ou mettre le pdf en local
        ]);

        $html = $this->twig->render('DonDuSang/pdf.html.twig', [
            'donDuSang' => $donDuSang
        ]);

        $mpdf->WriteHTML($html);

        $mpdf->Output("dondusang-$id.pdf", 'I');
    }

}
