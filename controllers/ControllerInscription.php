<?php

class ControllerInscription {
    private $_userManager;
    private $_view;

    public function __construct($url) {
        if(count($url) > 1) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->inscription();
        }
    }

    public function inscription() {
        $this->_userManager = new UserManager;

        $this->_view = new View("Inscription");
        $this->_view->generate(array("userManager" => $this->_userManager));
    }
}
?>