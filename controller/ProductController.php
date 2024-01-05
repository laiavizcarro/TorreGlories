<?php

include_once 'model/ProductDAO.php';

/**
 * ProductController s'encarrega de proveïr les funcionalitats per als productes
 * 
 */
class ProductController{

    /**
     * Constructor
     */
    function __construct() {
        // Iniciem la sessió en el cas de que no s'hagi inicialitzat.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    /**
     * Obtindre i retornar tots els productes de la web
     * 
     * Funcionalitat d'administrador
     */
    public function index() {
        $allProducts = ProductDAO::getAllProducts();
        include_once 'view/products-view.php';
    }

    /**
     * Retorna la vista de modificació d'un producte
     */
    public function insertView() {
        include_once 'view/product-insert-view.php';
    }

    /**
     * Crear un producte
     * 
     * Camps obligatoris:
     *  - Name
     *  - Category ID
     *  - IVA
     *  - Base Price
     * 
     */
    public function insert() {        
    
        if(empty($_POST['name']) || empty($_POST['category_id']) || 
            empty($_POST['iva']) || empty($_POST['base_price'])) {
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

        /*
         * Obtenir el càlcul corresponent a l'IVA indicat per a poder
         * calcular els preus totals
         */
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

    /**
     * Obtindre i retornar un producte a partir del seu id
     * 
     * El id s'envia per GET
     * 
     * Funcionalitat d'administrador
     */
    public function show() {
        $product = ProductDAO::getProductById($_GET['id']);
        include_once 'view/product-edit-view.php';
    }

    /**
     * Modificar un producte a partir del seu id
     * 
     * Funcionalitat d'administrador
     */
    public function update() {
        $product = ProductDAO::getProductById($_GET['id']);

        if(empty($_POST['name']) || empty($_POST['category_id']) || 
            empty($_POST['iva']) || empty($_POST['base_price'])) {
            $error = "Falten camps per emplenar";
            include_once 'view/product-edit-view.php';
            return;
        }

        $product->setName($_POST['name']);
        $product->setCategory($_POST['category_id']);
        $product->setIva($_POST['iva']);

        /*
         * Obtenir el càlcul corresponent a l'IVA indicat per a poder
         * calcular els preus totals
         */
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

    /**
     * Eliminar un producte a partir del seu id
     * 
     * Funcionalitat d'administrador
     */
    public function delete() {
        ProductDAO::deleteProduct($_GET['id']);
        header("Location:" . url . "?controller=Product");
    }

    /**
     * Llistar els productes per categoria seleccionada des de la Carta
     */
    public function products() {
        $categoryId = $_GET['category_id'];
        $productId = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $allProducts = ProductDAO::getProductsByCategory($categoryId, $productId);
        include_once 'view/menu-view.php';
    }

    
 
}

?>