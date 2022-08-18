<?php
class Burger {
    private $_id;
    private $_name;
    private $_description;
    private $_price;
    private $_image;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = "set".ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // setters
    public function setId($id) {$this->_id = $id;}
    public function setName($name) {$this->_name = $name;}
    public function setDescription($description) {$this->_description = $description;}
    public function setPrice($price) {$this->_price = $price;}
    public function setImage($image) {$this->_image = $image;}

    // getters
    public function getId() {return $this->_id;}
    public function getName() {return $this->_name;}
    public function getDescription() {return $this->_description;}
    public function getPrice() {return $this->_price;}
    public function getImage() {return $this->_image;}
}
?>