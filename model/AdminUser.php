<?php
include_once 'User.php';

/**
 * Entitat AdminUser que exten de User
 * 
 * Emmagatzema els usuaris Administradors
 */
class AdminUser extends User {
    
    /**
     * Propietats
     */
    private $incorporation_date;
    
    /**
     * Constructor
     */
    public function __construct() {
    }
    

    /**
     * Get the value of incorporation_date
     */ 
    public function getIncorporationDate() {
        return $this->incorporation_date;
    }

    /**
     * Set the value of incorporation_date
     *
     * @return  self
     */ 
    public function setIncorporationDate($incorporation_date) {
        $this->incorporation_date = $incorporation_date;
        return $this;
    }

}


?>