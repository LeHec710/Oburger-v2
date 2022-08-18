<?php
require 'views/View.php';
class Router {
    private $_controller;
    private $_view;
    private $_mvc = array("models", "views", "controllers");

    public function routeReq() {
         try {
            spl_autoload_register(function ($class) {
                $path = "";
                foreach ($this->_mvc as $key) {
                    $path = $key . '/' . $class . ".php";
                    if (file_exists($path)) {
                        break;
                    }
                }
                require_once($path);
            });

            $url = "";
            if(isset($_GET["url"])) {
                $url = explode("/", filter_var($_GET["url"], FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $this->_controller = new $controllerClass($url);
                } else {
                    throw new Exception("page introuvable");
                }
            } else {
                header("location: accueil");
            }
         } catch(Exception $e) {
            $errorMsg = $e->getMessage();
            $this->_view = new View("Error");
            $this->_view->generate(array("errorMsg" => $errorMsg));
         }
    }
}

?>