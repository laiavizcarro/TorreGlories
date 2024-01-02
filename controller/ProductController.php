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

    //Funció per a obtenir els productes de la base de dades a partir de la seva id 
    public function show() {
        $product = ProductDAO::getProductById($_GET['id']);
        include_once 'view/product-edit-view.php';
    }

    //Funció per a modificar un producte de la base de dades a partir de la seva id
    public function update() {
        $product = ProductDAO::getProductById($_GET['id']);

        $product->setName($_POST['name']);
        $product->setCategory($_POST['category_id']);
        $product->setIva($_POST['iva']);
        $ivaCalculation = PriceCalculator::getIvaCalculation($_POST['iva']);
        $product->setBasePrice($_POST['base_price']);
        $product->setTotalPrice($_POST['base_price'] * $ivaCalculation);
        $product->setIsOffer(isset($_POST['is_offer']));
        $product->setOfferPrice($_POST['offer_price']);
        if ($product->getOfferPrice() != null && !empty($product->getOfferPrice())) {
            $product->setTotalOfferPrice($_POST['offer_price'] * $ivaCalculation);
        }

        if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
            if (($_FILES["img"]["type"] == "image/jpeg" || $_FILES["img"]["type"] == "image/png") && ($_FILES["img"]["size"] < 3000000)) {
                $imageName = $_FILES['img']['name'];
                $imagePath = "images/uploads/" . $imageName;

                // Eliminar l'anterior imatge
                $deleted = unlink($product->getImgPath());
                if ($deleted) {
                    // Guardar la nova imatge
                    $created = move_uploaded_file($_FILES["img"]["tmp_name"], $imagePath);
                    if ($created) {
                        $product->setImgPath($imagePath);
                    }
                }
            } else {
                $error = "Format de la imatge no correcte";
                return;
            }
        }

        ProductDAO::updateProduct($product);
        
        header("Location:" . url . "?controller=Product");
    }

    //Funció per a eliminar un producte de la base de dades a partir de la seva id
    public function delete() {
        ProductDAO::deleteProduct($_GET['id']);
        header("Location:" . url . "?controller=Product");
    }

    public function insertView() {
        include_once 'view/product-insert-view.php';
    }

    //Funció per a insertar un producte a la base de dades 
    public function insert() {        
    
        if(empty($_POST['name']) || empty($_POST['category_id']) || empty($_POST['iva']) || empty($_POST['base_price'])) {
            $error = "Falten camps per emplenar";
            include_once 'view/product-insert-view.php';
            return;
        }
        
        if(isset($_POST['is_offer']) && !isset($_POST['offer_price'])){
            $error = "Cal indicar el preu base oferta";
            include_once 'view/product-insert-view.php';
            return;
        }
    
        $product = new Product();
        $product->setName($_POST['name']);
        $product->setCategory($_POST['category_id']);
        $product->setIva($_POST['iva']);
        $ivaCalculation = PriceCalculator::getIvaCalculation($_POST['iva']);
        $product->setBasePrice($_POST['base_price']);
        $product->setTotalPrice($_POST['base_price'] * $ivaCalculation);
        $product->setIsOffer(isset($_POST['is_offer']));
        $product->setOfferPrice($_POST['offer_price']);
        if ($product->getOfferPrice() != null && !empty($product->getOfferPrice())) {
            $product->setTotalOfferPrice($_POST['offer_price'] * $ivaCalculation);
        }

        if (!empty($_FILES['img'])) {
            if (($_FILES["img"]["type"] == "image/jpeg" || $_FILES["img"]["type"] == "image/png") && ($_FILES["img"]["size"] < 3000000)) {
                $imageName = $_FILES['img']['name'];
                $imagePath = "images/uploads/" . $imageName;
                $created = move_uploaded_file($_FILES["img"]["tmp_name"], $imagePath);
                if ($created) {
                    $product->setImgPath($imagePath);
                }
            } else {
                $error = "Format de la imatge no correcte";
                return;
            }
        }
    
        ProductDAO::insertProduct($product);

        header("Location:" . url . "?controller=Product");
    }

    //Funció per a obtenir els productes de la base de dades segons la seva categoria
    public function products() {
        $allProducts = ProductDAO::getProductsByCategory($_GET['category_id']);
        include_once 'view/menu-view.php';
    }

    
 
}

?>