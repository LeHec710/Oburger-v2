<?php

class ControllerConnexion {
    private $_userManager;
    private $_view;

    public function __construct($url) {
        if(count($url) > 1) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->connexion();
        }
    }

    public function connexion() {
        $this->_userManager = new UserManager;
        $users = $this->_userManager->getUsers();

        $this->_view = new View("Connexion");
        $this->_view->generate(array("userManager" => $this->_userManager, "users" => $users));
    }
}
?>