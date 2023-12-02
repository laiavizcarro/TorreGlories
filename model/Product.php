<?php

class Product {

    protected $id;
    protected $name;
    protected $category_id;
    protected $stock;
    protected $iva;
    protected $base_price;
    protected $total_price;
    protected $is_offer;
    protected $offer_price;
    protected $total_offer_price;
    protected $img_path;

    public function __construct(){
               
    }

    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category_id = $category;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of iva
     */ 
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set the value of iva
     *
     * @return  self
     */ 
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get the value of base_price
     */ 
    public function getBase_price()
    {
        return $this->base_price;
    }

    /**
     * Set the value of base_price
     *
     * @return  self
     */ 
    public function setBase_price($base_price)
    {
        $this->base_price = $base_price;

        return $this;
    }

    /**
     * Get the value of total_price
     */ 
    public function getTotal_price()
    {
        return $this->total_price;
    }

    /**
     * Set the value of total_price
     *
     * @return  self
     */ 
    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;

        return $this;
    }

    /**
     * Get the value of is_offer
     */ 
    public function getIs_offer()
    {
        return $this->is_offer;
    }

    /**
     * Set the value of is_offer
     *
     * @return  self
     */ 
    public function setIs_offer($is_offer)
    {
        $this->is_offer = $is_offer;

        return $this;
    }

    /**
     * Get the value of offer_price
     */ 
    public function getOffer_price()
    {
        return $this->offer_price;
    }

    /**
     * Set the value of offer_price
     *
     * @return  self
     */ 
    public function setOffer_price($offer_price)
    {
        $this->offer_price = $offer_price;

        return $this;
    }

    /**
     * Get the value of total_offer_price
     */ 
    public function getTotal_offer_price()
    {
        return $this->total_offer_price;
    }

    /**
     * Set the value of total_offer_price
     *
     * @return  self
     */ 
    public function setTotal_offer_price($total_offer_price)
    {
        $this->total_offer_price = $total_offer_price;

        return $this;
    }

    /**
     * Get the value of img_path
     */ 
    public function getImg_path()
    {
        return $this->img_path;
    }

    /**
     * Set the value of img_path
     *
     * @return  self
     */ 
    public function setImg_path($img_path)
    {
        $this->img_path = $img_path;

        return $this;
    }
}

?>