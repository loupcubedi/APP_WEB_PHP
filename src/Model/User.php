<?php

namespace src\Model;

class User
{
    private ?int $Id = null;

    private String $Mail;

    public function getId(): ?int
    {
        return $this->Id;
    }

    public function setId(?int $Id): User
    {
        $this->Id = $Id;
        return $this;
    }

    public function getMail(): string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): User
    {
        $this->Mail = $Mail;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(?string $Password): User
    {
        $this->Password = $Password;
        return $this;
    }

    public function getRoles(): array
    {
        return $this->Roles;
    }

    public function setRoles(array $Roles): User
    {
        $this->Roles = $Roles;
        return $this;
    }

    private ?String $Password;

    private Array $Roles;

    public static function SqlAdd(User $user)
        :int
    {
        $requete = BDD::getInstance()->("INSERT INTO users(Email,Password,NomPrenom,Roles)
        VALUES(:Email,:Password,:NomPrenom,:Roles)");

        $requete->executes([
            "Email" => $user ->GetMail(),
            "Password" => $user ->GetPassword(),
            "NomPrenom" => "Olivier Carglass",
            "Roles" =>  json_encode ($user->getRoles())
        ]);

        return BDD::getInstance()->lastinsertId();
    }



}