<?php

namespace src\Controller;
use src\Model\DonDuSang;
use src\Service\JwtService;

class ApiDondusangController
{
    public function __construct()
    {
        header("Content-Type: application/json; charset=utf-8");
    }

    public function getAll()
    {
        if ($_SERVER["REQUEST_METHOD"] != "GET") {
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode([
                "code" => 1,
                "Message" => "Get Attendu"
            ]);
        }

        $donsDuSang = DonDuSang::SqlGetAll();
        return json_encode($donsDuSang);
    }


    public function add()
    {
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode([
                "code" => 1,
                "Message" => "POST Attendu"
            ]);
        }
        $result = JwtService::checkToken();
        if($result["code"] == 1){
            return json_encode($result);
        }

        //Récupération du body en String
        $data = file_get_contents("php://input");
        //Conversion du string en JSON
        $json = json_decode($data);

        if(empty($json)){
            header("HTTP/1.1 403 Forbidden");
            return json_encode([
                "code" => 1,
                "Message" => "Il faut des données"
            ]);
        }

        if(!isset($json->Titre) || !isset($json->Description)){
            header("HTTP/1.1 403 Forbidden");
            return json_encode([
                "code" => 1,
                "Message" => "Il faut des données"
            ]);
        }

        // Extraction des données
        $EmailContact = isset($json->EmailContact) ? $json->EmailContact : null;
        $Prix = isset($json->Prix) ? $json->Prix : null;
        $Latitude = isset($json->Latitude) ? $json->Latitude : null;
        $Longitude = isset($json->Longitude) ? $json->Longitude : null;

        //Upload de l'image
        $sqlRepository = null;
        $nomImage = null;

        if(isset($json->Image)){
            // Renommer le fichier image (normalement le client envoi aussi le nom de l'image dans un autre champ pour tester les extensions, etc.)
            $nomImage = uniqid().".jpg";

            // Fabriquer répertoire d'accueil
            $dateNow = new \DateTime();
            $sqlRepository = $dateNow->format("Y/m");
            $repository = "{$_SERVER["DOCUMENT_ROOT"]}/uploads/images/{$sqlRepository}";
            if(!is_dir($repository)){
                mkdir($repository, 0777, true);
            }

            $ifp = fopen("{$repository}/{$nomImage}", "wb");
            fwrite($ifp, base64_decode($json->Image));
            fclose($ifp);
        }

        $donsDuSang = new DonDuSang();
        $donsDuSang->setNom($json->Titre)
            ->setDescription($json->Description)
            ->setDateEvenement (new \DateTime($json->DatePublication))
            ->setImageRepository($sqlRepository)
            ->setImageFileName($nomImage)
            ->setNomContact($json->Auteur)
            ->setEmailContact($EmailContact)
            ->setPrix($Prix)
            ->setLatitude($Latitude)
            ->setLongitude($Longitude);

        $id = DonDuSang::SqlAdd($donsDuSang);
        return json_encode([
            "code" => 0,
            "Message" => "Don du sang ajouté avec succès",
            "Id" => $id
        ]);
    }

    public function search()
    {
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode([
                "code" => 1,
                "Message" => "Post Attendu"
            ]);
        }

        //Récupération du body en String
        $data = file_get_contents("php://input");
        //Conversion du string en JSON
        $json = json_decode($data);

        if(!isset($json->keyword)){
            header("HTTP/1.1 403 Forbidden");
            return json_encode([
                "code" => 1,
                "Message" => "GET keyword manquant"
            ]);
        }

        $donsDuSang = DonDuSang::SqlSearch($json->keyword);
        return json_encode($donsDuSang);
    }
}
