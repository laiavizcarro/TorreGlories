<?php

include_once 'utils/PriceCalculator.php';

class Order {

    private $id;
    private $user_id;
    private $date;
    private $is_paid;
    private $total_price;

    private array $orderProducts = [];

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

    public function calculateTotalPrice() {
        $totalPrice = 0;

        foreach($this->getOrderProducts() as $orderProduct) {
            $totalPrice += $orderProduct->getTotalPrice() * $orderProduct->getQuantity();
        }

        return PriceCalculator::fixDecimal($totalPrice);
    }

}
