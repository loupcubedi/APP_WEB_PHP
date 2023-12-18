<?php

namespace src\Model;

class User
{
    private ?int $Id = null;
    private String $Mail;
    private String $Password;
    private array $Roles;

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

    public function getPassword(): string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): User
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

    public static function SqlAdd(User $user) :int
    {
        $requete = BDD::getInstance()->prepare("INSERT INTO users (Email, Password, NomPrenom, Roles) VALUES(:Email, :Password, :NomPrenom, :Roles)");

        $requete->execute([
            "Email" => $user->getMail(),
            "Password" => $user->getPassword(),
            "NomPrenom" => "Olivier Carglass", //Prévoir un champ dans le formulaire pour ça à l'avenir
            "Roles" => json_encode($user->getRoles())
        ]);

        return BDD::getInstance()->lastInsertId();
    }

    // Inside src/Model/User.php

// ...

    public static function getByEmail(string $email)
    {
        // Assuming you have a function like this that returns a MySQLi connection
        $conn = BDD::getMysqliConnection();

        // Sanitize the email to prevent SQL injection
        $email = mysqli_real_escape_string($conn, $email);

        // Prepare the SQL statement
        $sql = "SELECT * FROM users WHERE Email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // Check for errors
        if(!$result) {
            // Handle error - notify the administrator, log to a file, show an error screen, etc.
            return null;
        }

        $user_data = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        // Return the user data or null if not found
        return $user_data;
    }

// ...






}