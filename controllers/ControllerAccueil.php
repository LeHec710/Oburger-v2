<?php
class ControllerAccueil {
    private $_burgerManager;
    private $_userManager;
    private $_cart;
    private $_view;

    public function __construct($url) {
        if(is_countable($url) && count($url) > 1) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->burgers();
        }
    }

    public function burgers() {
        $this->_burgerManager = new BurgerManager;
        $this->_userManager = new UserManager;
        $this->_cart = new Cart;
        $burgers = $this->_burgerManager->getBurgers();

        $this->_view = new View("Accueil");
        $this->_view->generate(array("burgerManager" => $this->_burgerManager, "burgers" => $burgers, "userManager" => $this->_userManager, "cart" => $this->_cart));
    }
}
?>