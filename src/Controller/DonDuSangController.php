<?php

namespace src\Controller;

use Mpdf\Mpdf;
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

    public function pdf(int $id)
    {
        // Récupérer les détails du don du sang spécifique par ID
        $donDuSang = DonDuSang::SqlGetById($id);

        // Création d'une nouvelle instance de Mpdf
        $mpdf = new Mpdf([
            "tempDir" => $_SERVER["DOCUMENT_ROOT"]."/../var/cache/pdf" // Assurez-vous que ce chemin est correct et accessible en écriture
        ]);

        // Générer le HTML à partir de la vue Twig spécifique pour le PDF
        $html = $this->twig->render('DonDuSang/pdf.html.twig', [
            'donDuSang' => $donDuSang
        ]);

        // Écrire le HTML dans le document PDF
        $mpdf->WriteHTML($html);

        // Output du PDF dans le navigateur (I pour inline)
        $mpdf->Output("dondusang-$id.pdf", 'I');
    }

}
