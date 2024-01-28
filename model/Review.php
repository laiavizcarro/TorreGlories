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
  public $id;
  public $title;
  public $review;
  public $rate;
  public $order_id;
  public $date;
  public $user_name;

  /**
   * Constructor
   */
  public function __construct() {
  }

  /**
   * Get propietats
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set propietats
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
  public function getTitle() {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($title) {
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
   * Get the value of rate
   */
  public function getRate() {
    return $this->rate;
  }

  /**
   * Set the value of rate
   *
   * @return  self
   */
  public function setRate($rate) {
    $this->rate = $rate;

    return $this;
  }

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
   * Get the value of user_name
   */
  public function getUserName() {
    return $this->user_name;
  }

  /**
   * Set the value of user_name
   *
   * @return  self
   */
  public function setUserName($user_name) {
    $this->user_name = $user_name;

    return $this;
  }
}
