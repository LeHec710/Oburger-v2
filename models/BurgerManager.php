<?php
class BurgerManager extends Model {
    public function getBurgers() {
        return $this->getAll("burgers", "Burger");
    }

    public function getBurgerById($burgerId) {
        return $this->get("burgers", "burger", "id", $burgerId);
    }

    public function updateBurger($burgerId, $data) {
        $where = array("id" => $burgerId);
        header('Location: '.WEBROOT."burgers");
        return $this->update("Burgers", $data, $where);
    }

    public function setImagePath($image) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $array = explode(".", $image["name"]);
        $tmp_name = $image["tmp_name"];
        $extension = end($array);
        if(in_array($extension, $allowedExts)) {
            $dir =  "../assets/currentBurgers/".$image["name"];
            echo $tmp_name;
            if (move_uploaded_file($tmp_name, $dir)) {
                return substr($dir, 3);
            }
        }
        return false;
    }

    public function addBurger($data) {
        if(!empty($data["name"]) && !empty($data["price"]) && !empty($data["description"]) && !empty($data["image"])) {
            header('Location: '.WEBROOT."burgers");
            return $this->add("Burgers", $data);
        } else {
            $error = "Veuillez remplir tous les champs";
        }
    }

    public function deleteBurger($burgerId) {
        $where = array("id" => $burgerId); 
        $deletingBurger = $this->get("burgers", "burger", "id", $burgerId);
        $this->delete("burgers", array("id" => $burgerId));
        if(file_exists($deletingBurger->getImage())) {
            unlink("../assets/".$deletingBurger->getImage());
            echo "ok";
        } else {
            echo "pas ok";
            return "Un problème est survenu lors de la suppresion du burger";
        }
        header('Location: '.WEBROOT."burgers");
    }

    public function deleteImage($path) {
        if(file_exists($path)) {
            unlink($path);
            return true;
        } else {
            return "Un problème est survenu lors de la suppresion du burger";
        }
    }

    public function searchBurgers($name) {
        return $this->search("burgers", "burger", array("name" => $name));
    }
}
?>