<?php
class ControllerUsers {
    private $_view;
    private $_userManager;

    public function __construct($url) {
        if(count($url) > 2) {
            header('Location: '.WEBROOT."accueil");
            throw new Exception("page introuvable");
        } else {
            $this->users();
        }
    }

    public function users() {
        $this->_userManager = new UserManager;
        $users = $this->_userManager->getUsers();

        $this->_view = new View("Users");
        $this->_view->generate(array("userManager" => $this->_userManager, "users" => $users));
    }
}
?>