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



        // Token CSRF
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
        $donDuSang = DonDuSang::SqlGetById($id);

        // Ici, tu peux ajouter la logique pour le traitement du formulaire de mise à jour
        // et la mise à jour des informations du don du sang dans la base de données.
    }

    public function fixtures()
    {
        UserController::haveGoodRole(["Administrateur"]);
        //Exécuter une requête qui vide la table (truncate table articles)
        $requete = BDD::getInstance()->prepare("TRUNCATE TABLE dons_du_sang")->execute();
        //Créer 2 array PHP « jeu de donnée »
        $arrayTitre = ["loupbd@gmail.com", "test@test.test", "lephpcrigolo@gmail.test", "motorola@gmail.com", "viveleflutter@gmail.com"];
// - Un array PHP qui contient 6 Auteurs (prénom) différents
        $arrayAuteur = ["Enzo", "Lukas", "Rémi", "Bastien", "Loup", "Kylian"];
        //Créer une variable Datetime (date du jour)
        $dateDuJour = new \DateTime();
        //Boucle (For ou While) de 200 itérations
        // - Incrémenter la date +1 jour à chaque tour de boucle
        // - Mélanger les tableaux
        // - Requête Insertion de données à chaque boucle (prendre le premier Index de chaque Tableau pour créer du « random » en BDD)

        for($i=1;$i<=200;$i++) {
            $dateDuJour->modify("+1 day");
            shuffle($arrayAuteur);
            shuffle($arrayTitre);
            $dondusang = new DonDuSang();
            $dondusang->setEmailContact($arrayTitre[0])
                ->setDescription("Zypher est un langage de programmation moderne conçu pour offrir une expérience de développement puissante et flexible. Avec une syntaxe claire et concise, Zypher permet aux développeurs de créer des applications robustes et efficaces dans divers domaines, allant de l'informatique embarquée à la programmation web")
                ->setNom($arrayAuteur[0])
                ->setDateEvenement($dateDuJour);
            DonDuSang::SqlAdd($dondusang);
        }

        header("Location:/AdminDonDuSang/list");
    }
}
