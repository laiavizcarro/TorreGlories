<?php

/**
 * Entitat User
 * 
 * Emmagatzema les dades d'un usuari
 */
class User {

    /**
     * Propietats
     */
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $role_id;

    /**
     * Constructor
     */
    public function __construct() {
    }
        
    /*Get the value of id*/ 
    public function getId() {
        return $this->id;
    }

    /*Set the value of id and @return  self*/ 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /*Get the value of name*/ 
    public function getName() {
        return $this->name;
    }

    /*Set the value of name and @return  self*/ 
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname() {
        return $this->surname;
    }

    /*Set the value of surname and@return  self */ 
    public function setSurname($surname) {
        $this->surname = $surname;

        return $this;
    }

    /*Get the value of email */ 
    public function getEmail() {
        return $this->email;
    }

    /*Set the value of email and @return  self*/ 
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role_id
     */ 
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * Set the value of role_id
     *
     * @return  self
     */ 
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;

        return $this;
    }

    public function isAdmin() {
        return $this->role_id == 1;
    }
}

?>