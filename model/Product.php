<?php

class Product {

    private $id;
    private $name;
    private $category_id;
    private $iva;
    private $base_price;
    private $total_price;
    private $is_offer;
    private $offer_price;
    private $total_offer_price;
    private $img_path;

    public function __construct() {
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id) {
        $this->id = $id;

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
     * Get the value of category
     */
    public function getCategory() {
        return $this->category_id;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category) {
        $this->category_id = $category;

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
    public function isOffer() {
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

    /**
     * Get the value of img_path
     */
    public function getImgPath() {
        return $this->img_path;
    }

    /**
     * Set the value of img_path
     *
     * @return  self
     */
    public function setImgPath($img_path) {
        $this->img_path = $img_path;

        return $this;
    }
}
