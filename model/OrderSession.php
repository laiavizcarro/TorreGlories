<?php

/**
 * Entitat de sessió OrderSession
 * 
 * Emmagatzema la cistella en sessió de l'usuari fins que es guardada a la 
 * base de dades
 */
class OrderSession {

    /**
     * Propietats
     */
    private $product;
    private $quantity = 1;

    /**
     * Constructor
     */
    public function __construct() {}

    /**
     * Get the value of product
     */ 
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}

?>