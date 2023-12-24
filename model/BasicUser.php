<?php
include_once 'User.php';

class BasicUser extends User {
    
    //Atributes
    private $phone_number;
    
    //Constructor
    public function __construct($id = 0, $name = null, $surname = null, $email = null, $password = null, $role_id = null, $phone_number = null) {
        parent::__construct($id, $name, $surname, $email, $password, $role_id);
        $this->phone_number = $phone_number;
    }

    /*Get the value of phone_number*/ 
    public function getPhoneNumber() {
        return $this->phone_number;
    }

    /*Set the value of phone_number and@return  self*/ 
    public function setPhoneNumber($phone_number) {
        $this->phone_number = $phone_number;
        return $this;
    }

    
}


?>