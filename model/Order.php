<?php
class Order {

    protected $id;
    protected $user_id;
    protected $date;
    protected $is_paid;

    public function __construct($id, $user_id, $date, $is_paid) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->date = $date;
        $this->is_paid = $is_paid;
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
}
