<?php

class ControllerCommander {
    private $_userManager;
    private $_burgerManager;
    private $_cart;
    private $_view;

    public function __construct($url) {
        if(count($url) > 1) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->commander();
        }
    }

    public function commander() {
        $this->_userManager = new UserManager;
        $this->_burgerManager = new burgerManager;
        $this->_cart = new cart;


        $this->_view = new View("Commander");
        $this->_view->generate(array("userManager" => $this->_userManager, "burgerManager" => $this->_burgerManager, "cart" => $this->_cart));
    }
}
?>