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

        // Vérifier si les paramètres de pagination sont présents
        $page = isset($_GET['page']) ? (int)$_GET['page'] : null;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : null;
        $offset = $page ? ($page - 1) * $limit : null;

        // Appeler SqlGetAll avec ou sans paramètres de pagination
        $donsDuSang = DonDuSang::SqlGetAll($limit, $offset);

        return json_encode($donsDuSang);
    }




    public function add() // Requete API pour le add, avec une verif JWT
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

        $data = file_get_contents("php://input");
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

        $EmailContact = isset($json->EmailContact) ? $json->EmailContact : null;
        $Prix = isset($json->Prix) ? $json->Prix : null;
        $Latitude = isset($json->Latitude) ? $json->Latitude : null;
        $Longitude = isset($json->Longitude) ? $json->Longitude : null;

        $sqlRepository = null;
        $nomImage = null;

        if(isset($json->Image)){
            $nomImage = uniqid().".jpg";

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


    public function update() // Requete API pr l'update avec aussi la verif jwt
    {
        if ($_SERVER["REQUEST_METHOD"] != "PUT") {
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode(["code" => 1, "Message" => "PUT Attendu"]);
        }

        $result = JwtService::checkToken();
        if ($result["code"] == 1) {
            return json_encode($result);
        }

        $data = file_get_contents("php://input");
        $json = json_decode($data);

        // Ici on check si on a au moins nos données minimum necessaire pr faire l'update
        if (!isset($json->id) || !isset($json->Titre) || !isset($json->Description)) {
            header("HTTP/1.1 403 Forbidden");
            return json_encode(["code" => 1, "Message" => "Données manquantes pour la mise à jour"]);
        }

        $donDuSang = new DonDuSang();
        $donDuSang->setId($json->id)
            ->setNom($json->Titre)
            ->setDescription($json->Description);

        if (isset($json->DatePublication)) {
            try {
                $dateEvenement = new \DateTime($json->DatePublication);
                $donDuSang->setDateEvenement($dateEvenement);
            } catch (\Exception $e) {
                return json_encode(["code" => 1, "Message" => "Format de date invalide"]);
            }
        }
        if (isset($json->EmailContact)) {
            $donDuSang->setEmailContact($json->EmailContact);
        }

        if (isset($json->Prix)) {
            $donDuSang->setPrix($json->Prix);
        }

        if (isset($json->Latitude)) {
            $donDuSang->setLatitude($json->Latitude);
        }

        if (isset($json->Longitude)) {
            $donDuSang->setLongitude($json->Longitude);
        }

        if (isset($json->Auteur)) {
            $donDuSang->setNomContact($json->Auteur);
        }

        $result = DonDuSang::SqlUpdate($donDuSang);

        if ($result) {
            return json_encode(["code" => 0, "Message" => "Don du sang mis à jour avec succès"]);
        } else {
            return json_encode(["code" => 1, "Message" => "Erreur lors de la mise à jour"]);
        }
    }

    public function delete() // Ici on definit notre fonction delete, avec lechecking de jwt
    {
        if ($_SERVER["REQUEST_METHOD"] != "DELETE") {
            header("HTTP/1.1 405 Method Not Allowed");
            return json_encode(["code" => 1, "Message" => "DELETE Attendu"]);
        }

        $result = JwtService::checkToken();
        if ($result["code"] == 1) {
            return json_encode($result);
        }

        $data = file_get_contents("php://input");
        $json = json_decode($data);

        if (!isset($json->id)) { // verification si l'id est manquant ou non
            header("HTTP/1.1 403 Forbidden");
            return json_encode(["code" => 1, "Message" => "ID manquant pour la suppression"]);
        }

        $result = DonDuSang::SqlDelete($json->id);

        if ($result) {
            return json_encode(["code" => 0, "Message" => "Le Don du sang supprimé avec succès"]);
        } else {
            return json_encode(["code" => 1, "Message" => "Erreur lors de la suppression ou l'enregistrement n'existe pas"]);
        }
    }

}
