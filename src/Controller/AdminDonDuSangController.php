<?php

namespace src\Controller;

use src\Model\DonDuSang;
use src\Model\BDD;

class AdminDonDuSangController extends AbstractController
{
    // Liste tous les dons du sang
    public function list()
    {
        // Requête SQL pour obtenir tous les dons du sang
        $donsDuSang = DonDuSang::SqlGetAll();

        $token = bin2hex(random_bytes(32));
        $_SESSION["token"] = $token;

        // Rendu de la vue
        return $this->twig->render("Admin/DonDuSang/list.html.twig", [
            "donsDuSang" => $donsDuSang,
            "token" => $token
        ]);

    }

    // Supprime un don du sang
    public function delete()
    {
        if ($_SESSION["token"] == $_POST["token"]) {
            DonDuSang::SqlDelete($_POST["id"]);
        }

        header("Location:/AdminDonDuSang/list");
    }

    // Ajoute un nouveau don du sang
    public function add()
    {
        // Ici, tu peux ajouter la logique pour le traitement du formulaire d'ajout
        // et l'insertion d'un nouveau don du sang dans la base de données.
    }

    // Met à jour un don du sang
    public function update(int $id)
    {
        // Récupérer le don du sang à mettre à jour
        $donDuSang = DonDuSang::SqlGetById($id);

        // Vérifier si le formulaire a été soumis
        if (isset($_POST["Nom"])) {
            // Récupérer les données du formulaire
            $nom = $_POST["Nom"];
            $description = $_POST["Description"];
            $dateEvenement = new \DateTime($_POST["DateEvenement"]);
            $emailContact = $_POST["EmailContact"]; // Ajout de la récupération de l'email
            $nomContact = $_POST["NomContact"]; // Ajout de la récupération du nom du contact
            $prix = $_POST["Prix"];
            $latitude = floatval($_POST["Latitude"]); // Conversion en float
            $longitude = floatval($_POST["Longitude"]); // Conversion en float

            // Mettre à jour les propriétés du don du sang
            $donDuSang->setNom($nom)
                ->setDescription($description)
                ->setDateEvenement($dateEvenement)
                ->setEmailContact($emailContact) // Mise à jour de l'email
                ->setNomContact($nomContact) // Mise à jour du nom du contact
                ->setPrix($prix)
                ->setLatitude($latitude)
                ->setLongitude($longitude);

            // Mettre à jour le don du sang dans la base de données
            DonDuSang::SqlUpdate($donDuSang);

            // Rediriger l'utilisateur vers la liste des dons après la mise à jour
            header("Location:/AdminDonDuSang/list");
            exit();

        } else {
            // Afficher le formulaire de mise à jour avec les données actuelles du don du sang
            return $this->twig->render("Admin/DonDuSang/update.html.twig", [
                "don" => $donDuSang
            ]);
        }
    }



    public function fixtures()
    {
        UserController::haveGoodRole(["Administrateur"]);

        // Exécuter une requête qui vide la table (truncate table dons_du_sang)
        $requete = BDD::getInstance()->prepare("TRUNCATE TABLE dons_du_sang")->execute();

        // Créer des tableaux avec des données pour les titres, les noms de contact et les prix
        $arrayTitre = ["loupbd@gmail.com", "test@test.test", "lephpcrigolo@gmail.test", "motorola@gmail.com", "viveleflutter@gmail.com"];
        $arrayNomassociation = ["Croix rouge", "EFS", "Don de Sang pour la Vie", "Don du Sang Bénévole", "Solidarité Don de Sang"];
        $arrayNomsContact = ["Levebre Pierrick", "Jean Lefrancais", "Anoa Lebron", "Caitlin DeMatos", "Loup Bauduin", "Fabien Lierville", "Zerick Leneveu"];


        // Créer une variable Datetime (date du jour)
        $dateDuJour = new \DateTime();

        $latitudeMin = 43.0; // Latitude minimale pour la France
        $latitudeMax = 49.1; // Latitude maximale pour la France
        $longitudeMin = -1.142; // Longitude minimale pour la France (point le plus à l'ouest)
        $longitudeMax = 6.561; // Longitude maximale pour la France (point le plus à l'est)

// Boucle de 200 itérations
        for ($i = 1; $i <= 200; $i++) {
            $dateDuJour->modify("+1 day");
            shuffle($arrayTitre);

            // Sélectionner un nom de contact aléatoire
            $nomContact = $arrayNomsContact[array_rand($arrayNomsContact)];
            $nomAssociation = $arrayNomassociation[array_rand($arrayNomassociation)];

            // Générer des latitudes et des longitudes aléatoires pour la France
            $latitude = mt_rand($latitudeMin * 1000, $latitudeMax * 1000) / 1000; // Latitudes entre 41.0 et 51.1
            $longitude = mt_rand($longitudeMin * 1000, $longitudeMax * 1000) / 1000; // Longitudes entre -5.142 et 9.561

            // Générer un prix aléatoire entre 1 et 50
            $prixAleatoire = mt_rand(1, 50);

            $dondusang = new DonDuSang();
            $dondusang->setEmailContact($arrayTitre[0])
                ->setDescription("Zypher est un langage de programmation moderne conçu pour offrir une expérience de développement puissante et flexible. Avec une syntaxe claire et concise, Zypher permet aux développeurs de créer des applications robustes et efficaces dans divers domaines, allant de l'informatique embarquée à la programmation web")
                ->setNom($nomAssociation)
                ->setNomContact($nomContact)
                ->setDateEvenement($dateDuJour)
                ->setPrix($prixAleatoire)
                ->setLatitude($latitude) // Définir la latitude aléatoire en France
                ->setLongitude($longitude); // Définir la longitude aléatoire en France

            DonDuSang::SqlAdd($dondusang);
        }

        header("Location:/AdminDonDuSang/list");
    }


}
