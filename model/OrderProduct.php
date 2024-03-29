<?php

/**
 * Entitat OrderProduct
 * 
 * Emmagatzema les dades de tots els productes d'una cistella
 */
class OrderProduct {

    /**
     * Propietats
     */
    private $order_id;
    private $product_id;
    private $name;
    private $quantity;
    private $iva;
    private $base_price;
    private $total_price;
    private $is_offer;
    private $offer_price;
    private $total_offer_price;

    /**
     * Constructor
     */
    public function __construct() {}

    /**
     * Get the value of order_id
     */
    public function getOrderId() {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */
    public function setOrderId($order_id) {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */
    public function getProductId() {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */
    public function setProductId($product_id) {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of iva
     */
    public function getIva() {
        return $this->iva;
    }

    /**
     * Set the value of iva
     *
     * @return  self
     */
    public function setIva($iva) {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get the value of base_price
     */
    public function getBasePrice() {
        return $this->base_price;
    }

    /**
     * Set the value of base_price
     *
     * @return  self
     */
    public function setBasePrice($base_price) {
        $this->base_price = $base_price;

        return $this;
    }

    /**
     * Get the value of total_price
     */
    public function getTotalPrice() {
        return $this->total_price;
    }

    /**
     * Set the value of total_price
     *
     * @return  self
     */
    public function setTotalPrice($total_price) {
        $this->total_price = $total_price;

        return $this;
    }

    /**
     * Get the value of is_offer
     */
    public function getIsOffer() {
        return $this->is_offer;
    }

    /**
     * Set the value of is_offer
     *
     * @return  self
     */
    public function setIsOffer($is_offer) {
        $this->is_offer = $is_offer;

        return $this;
    }

    /**
     * Get the value of offer_price
     */
    public function getOfferPrice() {
        return $this->offer_price;
    }

    /**
     * Set the value of offer_price
     *
     * @return  self
     */
    public function setOfferPrice($offer_price) {
        $this->offer_price = $offer_price;

        return $this;
    }

    /**
     * Get the value of total_offer_price
     */
    public function getTotalOfferPrice() {
        return $this->total_offer_price;
    }

    /**
     * Set the value of total_offer_price
     *
     * @return  self
     */
    public function setTotalOfferPrice($total_offer_price) {
        $this->total_offer_price = $total_offer_price;

        return $this;
    }
}


?>