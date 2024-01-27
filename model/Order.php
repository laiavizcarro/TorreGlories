<?php

include_once 'utils/PriceCalculator.php';

/**
 * Entitat Order
 * 
 * Emmagatzema les dades de la cistella
 */
class Order {

    /**
     * Propietats
     */
    private $id;
    private $user_id;
    private $user_name;
    private $user_surname;
    private $date;
    private $is_paid;
    private $total_price;
    private $review_count;

    private array $orderProducts = [];


    /**
     * Constructor
     */
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
     * Get the value of user_id
     */
    public function getUserId() {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUserId($user_id) {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of is_paid
     */
    public function getIsPaid() {
        return $this->is_paid;
    }

    /**
     * Set the value of is_paid
     *
     * @return  self
     */
    public function setIsPaid($is_paid) {
        $this->is_paid = $is_paid;

        return $this;
    }

    /**
     * Get the value of products
     */
    public function getOrderProducts() {
        return $this->orderProducts;
    }

    /**
     * Set the value of products
     *
     * @return  self
     */
    public function setOrderProducts($orderProducts) {
        $this->orderProducts = $orderProducts;

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
     * Get the value of user_name
     */ 
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * Set the value of user_name
     *
     * @return  self
     */ 
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * Get the value of user_surname
     */ 
    public function getUserSurname()
    {
        return $this->user_surname;
    }

    /**
     * Set the value of user_surname
     *
     * @return  self
     */ 
    public function setUserSurname($user_surname)
    {
        $this->user_surname = $user_surname;

        return $this;
    }


    /**
     * Calcula el preu total de la cistella
     * 
     * @return string Preu total amb decimals
     */
    public function calculateTotalPrice() {
        $totalPrice = 0;

        foreach($this->getOrderProducts() as $orderProduct) {
            $totalPrice += $orderProduct->getIsOffer() 
                ? $orderProduct->getTotalOfferPrice() * $orderProduct->getQuantity()
                : $orderProduct->getTotalPrice() * $orderProduct->getQuantity();
        }

        return PriceCalculator::fixDecimal($totalPrice);
    }

    /**
     * Get the value of review_count
     */ 
    public function getReviewCount()
    {
        return $this->review_count;
    }

    /**
     * Set the value of review_count
     *
     * @return  self
     */ 
    public function setReviewCount($review_count)
    {
        $this->review_count = $review_count;

        return $this;
    }


    /**
     * Retorna si la comanda te review o no
     * 
     * @return boolean True/False conte review
     */
    public function hasReview() {
        return $this->review_count > 0;
    }
}
