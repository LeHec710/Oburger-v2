<?php
class UserManager extends model {

    // get all users
    public function getUsers() {
        return $this->getAll("users", "User");
    }

    // get an user
    public function getUser($col, $val) {
        return $this->get("users", "User", $col, $val);
    }

    // update burger by id
    public function updateUser($userId, $data) {
        $where = array("id" => $userId);
        header('Location: '.WEBROOT."users");
        return $this->update("Users", $data, $where);
    }

    // search user by name
    public function searchUser($name) {
        return $this->search("users", "user", array("Firstname" => $name));
    }

    // register an user
    public function register(array $data) {
        extract($data);
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if(self::userExists($email)) {
                    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
                    if($this->add("users", $data)) {
                        header('Location:'.WEBROOT.'connexion');
                    } else {
                        return "Une erreur est survenue lors de la création de votre compte.";
                    }
                } else {
                    return "Votre adresse email est déjà utilisée par un autre utilisateur.";
                }
            } else {
                return "Veuillez saisir une adresse email valide.";
            }
        } else {
            return "Veuillez remplir tous les champs.";
        }
    }
    
    public function deleteUser($userId) {
        $where = array("id" => $userId); 
        $deletingBurger = $this->get("users", "user", "id", $userId);
        $this->delete("users", array("id" => $userId));
        header('Location: '.WEBROOT."users");
    }

    // login an user
    public function login(array $data) {
        extract($data);
        if(!empty($email) && !empty($password)) {
            if(!self::userExists($email)) {
                $user = $this->getUser("email", $email);
                if(password_verify($password, $user->getPassword())) {
                    $_SESSION["id"] = $user->getId();
                    $_SESSION["firstname"] = $user->getFirstname();
                    $_SESSION["lastname"] = $user->getLastname();
                    $_SESSION["email"] = $user->getEmail();
                    $_SESSION["date"] = $user->getDate();
                    $_SESSION["role"] = $user->getRole();
                    header('Location:'.WEBROOT.'accueil');
                } else {
                    return "Mauvais mot de passe";
                }
            } else {
                return "Mauvaise adresse email";
            }
        } else {
            return "Veuillez remplir tous les champs";
        }
    }

    // check if user exists(by email)
    public function userExists($email) {
        $userExists = $this->getBdd()->prepare('select email from users where email = ?');
        $userExists->execute(array($email));
        $found = $userExists->fetchColumn();
        if(!$found) {
            return true;
        } else {
            return false;
        }
    }

    // check if user is logged in
    public function isLoggedIn() {
        if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
            return true;
        } else {
            return false;
        }
    }
}
?>