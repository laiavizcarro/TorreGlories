<?php
/**
 * Entitat Review
 * 
 * Emmagatzema les dades d'una ressenya
 */

class Review {

    /**
     * Propietats
     */

     private $id;
     private $title;
     private $review;
     private $order_id;
     private $date;

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
     * Get the value of title
     */
    public function getReviewTitle() {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setReviewTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of review
     */
    public function getReview() {
        return $this->review;
    }

    /**
     * Set the value of review
     *
     * @return  self
     */
    public function setReview($review) {
        $this->review = $review;

        return $this;
    }

    /**
     * Get the value of orderId
     */
    public function getOrderId() {
        return $this->order_id;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */
    public function setOrderId($orderId) {
        $this->order_id = $orderId;

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
}

?>