<?php
include_once 'User.php';

class AdminUSer extends User {
    //Atributes
    private $incorporation_date;
    
    //Constructor
    public function __construct($id, $name, $surname, $email, $password, $role_id, $incorporation_date) {
        parent::__construct($id, $name, $surname, $email, $password, $role_id);
        $this->incorporation_date = $incorporation_date;
    }
    

    /* Get the value of incorporationDate */ 
    public function getIncorporationDate() {
        return $this->incorporation_date;
    }

    /* Set the value of incorporationDate and @return  self */ 
    public function setIncorporationDate($incorporation_date) {
        $this->incorporation_date = $incorporation_date;
        return $this;
    }

    public function createUser() {

    }

    public function deleteUser() {

    }

    public function updateUser() {
        
    }

}


?>