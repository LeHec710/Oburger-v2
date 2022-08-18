<?php
class Cart {
    public function __construct() {
        if(!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }
    }

    public function remove($burgerId) {
        unset($_SESSION["cart"][$burgerId]);
    }

    public function delete() {
        unset($_SESSION["cart"]);
        $_SESSION["cart"] = array();
    }

    public function add($burgerId, $amount = 1) {
        // $this->delete();
        $exist = false;
        if(!empty($_SESSION["cart"])) {
            foreach($_SESSION["cart"] as $b) {
                if($b["id"] == $burgerId) {
                    $exist = true;
                    $_SESSION["cart"][$burgerId]["amount"] += 1;
                }
            }
        }
        if(!$exist) {
            $_SESSION["cart"][$burgerId] = array("id" =>$burgerId, "amount" => $amount);
            // array_push($_SESSION["cart"],array("id" =>$burgerId, "amount" => $amount));
        }
    }

    public function editAmount($burgerId, $amount) {
        $_SESSION["cart"][$burgerId]["amount"] = $amount;
    }
}
?>