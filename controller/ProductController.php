<?php
include_once 'model/ProductDAO.php';

class ProductController{

    function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function index() {
        $allProducts = ProductDAO::getAllProducts();
        include_once 'view/products-view.php';
    }

    public function show() {
        $product = ProductDAO::getProductById($_GET['id']);
        include_once 'view/product-edit-view.php';
    }

    public function update() {
        $product = ProductDAO::getProductById($_GET['id']);

        $product->setName($_POST['name']);
        $product->setCategory($_POST['category_id']);
        $product->setStock($_POST['stock']);
        $product->setIva($_POST['iva']);
        $product->setBase_price($_POST['base_price']);
        $product->setTotal_price($_POST['total_price']);
        $product->setIs_offer(isset($_POST['is_offer']));
        $product->setOffer_price($_POST['offer_price']);
        $product->setTotal_offer_price($_POST['total_offer_price']);

        ProductDAO::updateProduct($product);
        
        header("Location:" . url . "?controller=Product");
    }

    public function delete() {
        ProductDAO::deleteProduct($_GET['id']);
        header("Location:" . url . "?controller=Product");
    }

    public function insert() {
        $allProducts = ProductDAO::insertProduct();
        include_once 'view/product-insert-view.php';
    }

    public function products() {
        $allProducts = ProductDAO::getProductsByCategory($_GET['category_id']);
        include_once 'view/menu-view.php';
    }

    
 
}

?>