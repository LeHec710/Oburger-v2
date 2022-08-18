<?php
class ControllerBurgers {
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
        $burgers = $this->_burgerManager->getBurgers();

        $this->_view = new View("Burgers");
        $this->_view->generate(array("burgerManager" => $this->_burgerManager, "burgers" => $burgers));
    }
}
?>