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
    private $userName;
    private $userSurname;
    private $date;
    private $is_paid;
    private $total_price;

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
     * Get the value of userName
     */ 
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */ 
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of userSurname
     */ 
    public function getUserSurname()
    {
        return $this->userSurname;
    }

    /**
     * Set the value of userSurname
     *
     * @return  self
     */ 
    public function setUserSurname($userSurname)
    {
        $this->userSurname = $userSurname;

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
}
