<?php

namespace src\Controller;

use src\Model\User;

class UserController extends AbstractController
{
    public function create()
    {
        if(isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["roles"])){
            $user = new User();
            $hashpass = password_hash($_POST["password"], PASSWORD_BCRYPT, ["cost"=>12]);
            $user->setMail($_POST["mail"])
                ->setPassword($hashpass)
                ->setRoles($_POST["roles"]);
            $id = User::SqlAdd($user);
            header("Location:/User/login");
            exit();
        }else{
            return $this->twig->render("User/create.html.twig");
        }
    }

    // Inside src/Controller/UserController.php

// ...

    public function login()
    {
        if (isset($_POST["mail"]) && isset($_POST["password"])) {
            $user_data = User::getByEmail($_POST["mail"]);

            if ($user_data) {
                // User exists, now check the password
                if (password_verify($_POST["password"], $user_data['Password'])) {
                    // Password is correct, create the session
                    session_start();
                    $_SESSION['user_id'] = $user_data['Id'];
                    $_SESSION['user_roles'] = json_decode($user_data['Roles'], true);

                    // Redirect to the user's profile or dashboard page
                    header("Location: /User/dashboard");
                    exit();
                } else {
                    // Password is incorrect
                    $error = 'The password you entered is incorrect.';
                }
            } else {
                // No user found with that email
                $error = 'No account found with that email address.';
            }

            // Redirect back to the login page with an error message
            header("Location: /User/login?error=" . urlencode($error));
            exit();
        } else {
            // Render the login page if the POST variables aren't set
            return $this->twig->render("User/login.html.twig");
        }
    }

// ...

}