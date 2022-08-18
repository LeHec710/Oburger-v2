<?php
class ControllerAccueil {
    private $_view;
    private $_userManager;

    public function __construct($url) {
        if(is_countable($url) && count($url) > 1) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->accueil();
        }
    }

    public function accueil() {
        $this->_userManager = new UserManager;
        $this->_view = new View("Accueil");
        $this->_view->generate(array("userManager" => $this->_userManager));
    }
}
?>