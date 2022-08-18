<?php
class User {
    private $_id;
    private $_firstname;
    private $_lastname;
    private $_email;
    private $_password;
    private $_date;
    private $_role;

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
    public function setFirstname($firstname) {$this->_firstname = $firstname;}
    public function setLastname($lastname) {$this->_lastname = $lastname;}
    public function setEmail($email) {$this->_email = $email;}
    public function setPassword($password) {$this->_password = $password;}
    public function setDate($date) {$this->_date = $date;}
    public function setRole($role) {$this->_role = $role;}

    // getters
    public function getId() {return $this->_id;}
    public function getFirstname() {return $this->_firstname;}
    public function getLastname() {return $this->_lastname;}
    public function getEmail() {return $this->_email;}
    public function getPassword() {return $this->_password;}
    public function getDate() {return $this->_date;}
    public function getRole() {return $this->_role;}
}
?>