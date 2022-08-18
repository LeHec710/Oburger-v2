<?php

class ControllerDeconnexion {
    private $_userManager;

    public function __construct($url) {
        if(count($url) > 1) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->deconnexion();
        }
    }

    public function deconnexion() {
        session_start();
        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        header("Location: ".WEBROOT."accueil");
    }
}
?>