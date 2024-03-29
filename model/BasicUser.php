<?php

include_once 'User.php';

/**
 * Entitat BasicUser que exten de User
 * 
 * Emmagatzema els usuaris Basics
 */
class BasicUser extends User {
    
    /**
     * Properties
     */
    private $phone_number;
    
    /**
     * Constructor
     */
    public function __construct() {
    }

	/**
	 * Get the value of phone_number
	 */ 
    public function getPhoneNumber() {
        return $this->phone_number;
    }

    /**
     * Set the value of phone_number
     *
     * @return  self
     */ 
    public function setPhoneNumber($phone_number) {
        $this->phone_number = $phone_number;
        return $this;
    }

    
}


?>