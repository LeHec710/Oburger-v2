<?php
class ControllerAddburger {
    private $_view;
    private $_burgerManager;

    public function __construct($url) {
        if(count($url) > 2) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->burgers();
        }
    }

    public function burgers() {
        $this->_burgerManager = new BurgerManager;

        $this->_view = new View("AddBurger");
        $this->_view->generate(array("burgerManager" => $this->_burgerManager));
    }
}
?>