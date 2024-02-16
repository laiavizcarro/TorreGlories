<?php

include_once 'utils/Utils.php';
include_once 'model/Product.php';
include_once 'model/ProductDAO.php';

/**
 * Obté tots els productes de la base de dades
 */
class ProductController {

    public function getProducts() {
        $allProducts = ProductDAO::getAllProducts();
        echo json_encode([
            "success" => true,
            "message" => null,
            "data" => Utils::toJsonArray($allProducts)
        ]);

        return;
    }

}

?>

