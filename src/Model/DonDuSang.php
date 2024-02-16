<?php

namespace src\Model;
use \PDO;



class DonDuSang implements \JsonSerializable {
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?\DateTime $date_evenement = null;
    private ?int $prix = null;
    private ?float $latitude = null;
    private ?float $longitude = null;
    private ?string $nom_contact = null;
    private ?string $email_contact = null;
    private ?string $photo_url = null;
    private ?string $image_repository = null;
    private ?string $image_filename = null;

    // Getters
    public function getId(): ?int {
        return $this->id;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function getDateEvenement(): ?\DateTime {
        return $this->date_evenement;
    }

    public function getPrix(): ?int {
        return $this->prix;
    }

    public function getLatitude(): ?float {
        return $this->latitude;
    }

    public function getLongitude(): ?float {
        return $this->longitude;
    }

    public function getNomContact(): ?string {
        return $this->nom_contact;
    }

    public function getEmailContact(): ?string {
        return $this->email_contact;
    }

    public function getPhotoUrl(): ?string {
        return $this->photo_url;
    }

    // Setters
    public function setId(?int $id): DonDuSang {
        $this->id = $id;
        return $this;
    }

    public function setNom(?string $nom): DonDuSang {
        $this->nom = $nom;
        return $this;
    }

    public function setDescription(?string $description): DonDuSang {
        $this->description = $description;
        return $this;
    }

    public function setDateEvenement(?\DateTime $date_evenement): DonDuSang {
        $this->date_evenement = $date_evenement;
        return $this;
    }

    public function setPrix(?int $prix): DonDuSang {
        $this->prix = $prix;
        return $this;
    }



    public function setLatitude(?float $latitude): DonDuSang {
        $this->latitude = $latitude;
        return $this;
    }

    public function setLongitude(?float $longitude): DonDuSang {
        $this->longitude = $longitude;
        return $this;
    }

    public function setNomContact(?string $nom_contact): DonDuSang {
        $this->nom_contact = $nom_contact;
        return $this;
    }

    public function setEmailContact(?string $email_contact): DonDuSang {
        $this->email_contact = $email_contact;
        return $this;
    }


    public function setPhotoUrl(?string $photo_url): DonDuSang {
        $this->photo_url = $photo_url;
        return $this;
    }

    public function getImageRepository(): ?string {
        return $this->image_repository;
    }

    public function setImageRepository(?string $image_repository): DonDuSang {
        $this->image_repository = $image_repository;
        return $this;
    }

    // Getter et setter pour image_filename
    public function getImageFileName(): ?string {
        return $this->image_filename;
    }

    public function setImageFileName(?string $image_filename): DonDuSang {
        $this->image_filename = $image_filename;
        return $this;
    }

    // JSON Serialize
    public function jsonSerialize(): mixed {
        return [
            'id' => $this->getId(),
            'nom' => $this->getNom(),
            'description' => $this->getDescription(),
            'date_evenement' => $this->getDateEvenement()?->format('Y-m-d'),
            'prix' => $this->getPrix(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'nom_contact' => $this->getNomContact(),
            'email_contact' => $this->getEmailContact(),
            'photo_url' => $this->getPhotoUrl(),
            'image_repository' => $this->getImageRepository(),
            'image_filename' => $this->getImageFileName(),
        ];
    }

    // ... (les autres parties de la classe restent inchangées)

// Méthode pour ajouter un nouveau lieu de don du sang dans la base de données
    // Méthode pour ajouter un nouveau lieu de don du sang dans la base de données
    public static function SqlAdd(DonDuSang $donDuSang): int {
        $bdd = BDD::getInstance();
        $requete = $bdd->prepare("INSERT INTO dons_du_sang (nom, description, date_evenement, prix, latitude, longitude, nom_contact, email_contact, photo_url, image_repository, image_filename) VALUES (:nom, :description, :date_evenement, :prix, :latitude, :longitude, :nom_contact, :email_contact, :photo_url, :image_repository, :image_filename)");

        $requete->execute([
            "nom" => $donDuSang->getNom(),
            "description" => $donDuSang->getDescription(),
            "date_evenement" => $donDuSang->getDateEvenement()->format("Y-m-d"),
            "prix" => $donDuSang->getPrix(),
            "latitude" => $donDuSang->getLatitude(),
            "longitude" => $donDuSang->getLongitude(),
            "nom_contact" => $donDuSang->getNomContact(),
            "email_contact" => $donDuSang->getEmailContact(),
            "photo_url" => $donDuSang->getPhotoUrl(),
            "image_repository" => $donDuSang->getImageRepository(), // Ajouter image_repository
            "image_filename" => $donDuSang->getImageFileName() // Ajouter image_filename
        ]);

        return $bdd->lastInsertId();
    }


// Méthode pour obtenir tous les lieux de don du sang de la base de données
    public static function SqlGetAll() {
        $bdd = BDD::getInstance();
        $requete = $bdd->prepare('SELECT * FROM dons_du_sang');
        $requete->execute();
        $donsDuSangSql = $requete->fetchAll(\PDO::FETCH_ASSOC);
        $donsDuSangObjet = [];

        foreach ($donsDuSangSql as $donSql) {
            $donDuSang = new DonDuSang();
            $donDuSang->setId($donSql["id"])
                ->setNom($donSql["nom"])
                ->setDescription($donSql["description"])
                ->setDateEvenement(new \DateTime($donSql["date_evenement"]))
                ->setPrix($donSql["prix"])
                ->setLatitude($donSql["latitude"])
                ->setLongitude($donSql["longitude"])
                ->setNomContact($donSql["nom_contact"])
                ->setEmailContact($donSql["email_contact"])
                ->setImageRepository($donSql["image_repository"])
                ->setImageFileName($donSql["image_filename"]);
            $donsDuSangObjet[] = $donDuSang;
        }


        return $donsDuSangObjet;
    }


// Méthode pour obtenir un lieu de don du sang spécifique par son ID
    public static function SqlGetById(int $id): DonDuSang {
        $bdd = BDD::getInstance();
        $requete = $bdd->prepare("SELECT * FROM dons_du_sang WHERE id = :id");
        $requete->bindValue(":id", $id, \PDO::PARAM_INT); // Lier le paramètre :id
        $requete->execute();
        $donDuSangData = $requete->fetch(PDO::FETCH_ASSOC);

        $donDuSang = new DonDuSang();
        $donDuSang->setId($donDuSangData["id"])
            ->setNom($donDuSangData["nom"])
            ->setDescription($donDuSangData["description"])
            ->setDateEvenement(new \DateTime($donDuSangData["date_evenement"]))
            ->setPrix($donDuSangData["prix"])
            ->setLatitude($donDuSangData["latitude"])
            ->setLongitude($donDuSangData["longitude"])
            ->setNomContact($donDuSangData["nom_contact"])
            ->setEmailContact($donDuSangData["email_contact"])
            ->setImageRepository($donDuSangData["image_repository"])
            ->setImageFileName($donDuSangData["image_filename"]);

        return $donDuSang;
    }





// Méthode pour mettre à jour un lieu de don du sang dans la base de données
    public static function SqlUpdate(DonDuSang $donDuSang): bool {
        $bdd = BDD::getInstance();
        $requete = $bdd->prepare("UPDATE dons_du_sang SET nom = :nom, description = :description, date_evenement = :date_evenement, prix = :prix, latitude = :latitude, longitude = :longitude, nom_contact = :nom_contact, email_contact = :email_contact, photo_url = :photo_url WHERE id = :id");

        $result = $requete->execute([
            "id" => $donDuSang->getId(),
            "nom" => $donDuSang->getNom(),
            "description" => $donDuSang->getDescription(),
            "date_evenement" => $donDuSang->getDateEvenement()->format("Y-m-d"),
            "prix" => $donDuSang->getPrix(),
            "latitude" => $donDuSang->getLatitude(),
            "longitude" => $donDuSang->getLongitude(),
            "nom_contact" => $donDuSang->getNomContact(),
            "email_contact" => $donDuSang->getEmailContact(),
            "photo_url" => $donDuSang->getPhotoUrl()
        ]);

        return $result;
    }


// Méthode pour supprimer un lieu de don du sang de la base de données
    public static function SqlDelete(int $id): bool {
        $bdd = BDD::getInstance();
        $requete = $bdd->prepare("DELETE FROM dons_du_sang WHERE id = :id");
        $requete->execute(["id" => $id]);
        return $requete->rowCount() > 0;
    }

}

