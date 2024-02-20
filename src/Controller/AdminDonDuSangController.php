<?php

namespace src\Controller;

use src\Model\DonDuSang;
use src\Model\BDD;

class AdminDonDuSangController extends AbstractController  // Grace a ca, on hérite de nos fonctions twig
{
    // Ici, je fais toutes les opérations qui sont liés a l'administrateur
    public function list() // Ici on défini ma fonction List, elle me servira a avoir mon rendu dans ma liste de don dusang,
                             //on y genere aussi un token, qu'on utilisera pr sécurisé mes autres méthode
    {
        $donsDuSang = DonDuSang::SqlGetAll();

        $token = bin2hex(random_bytes(32));
        $_SESSION["token"] = $token;

        return $this->twig->render("Admin/DonDuSang/list.html.twig", [
            "donsDuSang" => $donsDuSang,
            "token" => $token
        ]);

    }

    public function delete() // Ici , on a la fonction delete, on y check si je suis bien log en tant qu'un admininistrateur, si oui, on check le token de session
    {
        UserController::haveGoodRole(["Administrateur"]);
        if ($_SESSION["token"] == $_POST["token"]) {
            DonDuSang::SqlDelete($_POST["id"]);
        }

        header("Location:/AdminDonDuSang/list");
    }

    public function add() // Ici, pareil que pr la méthode delete, mais pr add
    {
        UserController::haveGoodRole(["Administrateur"]);

        $sqlRepository = null;
        $nomImage = null;

        if (isset($_POST["Nom"])) {
            $donDuSang = new DonDuSang();

            // Récupérer les données du formulaire
            $nom = $_POST["Nom"];
            $description = $_POST["Description"];
            $dateEvenement = new \DateTime($_POST["DateEvenement"]);
            $emailContact = $_POST["EmailContact"];
            $nomContact = $_POST["NomContact"];
            $prix = $_POST["Prix"];
            $latitude = floatval($_POST["Latitude"]);
            $longitude = floatval($_POST["Longitude"]);

            if (isset($_FILES['Photo']) && $_FILES['Photo']['error'] == 0) {
                $tmpName = $_FILES['Photo']['tmp_name'];
                $name = basename($_FILES['Photo']['name']);
                $dateNow = new \DateTime();
                $sqlRepository = $dateNow->format("Y/m");
                $repository = "{$_SERVER["DOCUMENT_ROOT"]}/uploads/images/{$sqlRepository}";
                if (!is_dir($repository)) {
                    mkdir($repository, 0777, true);
                }
                $uploadFile = $repository . '/' . $name;
                if (move_uploaded_file($tmpName, $uploadFile)) {
                    $nomImage = $name;
                } else {
                    header("HTTP/1.1 500 Internal Server Error");
                    return json_encode([
                        "code" => 1,
                        "Message" => "Erreur lors de l'upload de l'image"
                    ]);
                }
            }

            // Mettre à jour les propriétés du don du sang
            $donDuSang->setNom($nom)
                ->setDescription($description)
                ->setDateEvenement($dateEvenement)
                ->setEmailContact($emailContact)
                ->setNomContact($nomContact)
                ->setPrix($prix)
                ->setLatitude($latitude)
                ->setLongitude($longitude)
                ->setImageRepository($sqlRepository) // Définir le répertoire de l'image
                ->setImageFileName($nomImage); // Définir le nom de l'image

            // Ajouter le don du sang à la base de données
            DonDuSang::SqlAdd($donDuSang);

            // Rediriger l'utilisateur vers la liste des dons après l'ajout
            header("Location:/AdminDonDuSang/list");
            exit();
        } else {
            return $this->twig->render("Admin/DonDuSang/add.html.twig");
        }
    }




    public function update(int $id) // ici ma méthode update, meme controle

    {
        UserController::haveGoodRole(["Administrateur"]);

        $donDuSang = DonDuSang::SqlGetById($id); // on recupere le don du sang par son id

        if (isset($_POST["Nom"])) {
            $sqlRepository = $donDuSang->getImageRepository();
            $nomImage = $donDuSang->getImageFileName();

            if (isset($_FILES["Photo"]) && $_FILES["Photo"]["error"] == 0) {     // ici on verifie si les données ont été soumise dans le formu

                $extensionsAutorisee = ["jpg", "jpeg", "png"];
                $extension = pathinfo($_FILES["Photo"]["name"], PATHINFO_EXTENSION);

                if (in_array($extension, $extensionsAutorisee)) {
                    // Ici on supprime l'ancienne image si elle existe
                    $oldImagePath = $_SERVER["DOCUMENT_ROOT"]."/uploads/images/".$sqlRepository."/".$nomImage;
                    if ($nomImage && file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }

                    $dateNow = new \DateTime();
                    $sqlRepository = $dateNow->format("Y/m");
                    $repository = $_SERVER["DOCUMENT_ROOT"] . "/uploads/images/" . $sqlRepository;
                    if (!is_dir($repository)) {
                        mkdir($repository, 0777, true);
                    }

                    // Je renomme le fichier image avec un id unique
                    $nomImage = uniqid() . "." . $extension;

                    if (!move_uploaded_file($_FILES["Photo"]["tmp_name"], $repository . "/" . $nomImage)) {

                        return $this->twig->render("Admin/DonDuSang/update.html.twig", [
                            "don" => $donDuSang,
                            "error" => "Problème lors de l'upload de l'image."
                        ]);
                    }
                }
            }

            // Puis apres tout ça, on fais la mise a jour
            $donDuSang->setNom($_POST["Nom"])
                ->setDescription($_POST["Description"])
                ->setDateEvenement(new \DateTime($_POST["DateEvenement"]))
                ->setEmailContact($_POST["EmailContact"])
                ->setNomContact($_POST["NomContact"])
                ->setPrix($_POST["Prix"])
                ->setLatitude(floatval($_POST["Latitude"]))
                ->setLongitude(floatval($_POST["Longitude"]))
                ->setImageRepository($sqlRepository)
                ->setImageFileName($nomImage);


            DonDuSang::SqlUpdate($donDuSang);


            header("Location:/AdminDonDuSang/list");
            exit();
        } else {
            // Afficher à nouveau le formulaire de mise à jour avec les informations actuelles du don du sang
            return $this->twig->render("Admin/DonDuSang/update.html.twig", [
                "don" => $donDuSang
            ]);
        }
    }







    public function details(int $id)
    {
        // Récupérez les détails du don du sang en fonction de l'ID (utilisez votre propre méthode)
        $donDuSang = DonDuSang::SqlGetById($id);

        if (!$donDuSang) {
            throw $this->createNotFoundException('Don du sang non trouvé.');
        }

        // Affichez la vue pour les détails du don du sang
        return $this->twig->render("DonDuSang/show.html.twig", [
            'donDuSang' => $donDuSang,
        ]);
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
