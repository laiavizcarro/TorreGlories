<?php
include_once 'config/db.php';
include_once 'model/Product.php';

class ProductDAO {

    public static function getAllProducts(){

        $con = DB::connectDB();

        $query = "SELECT p.*, c.name as categoryName FROM products p ";
        $query .= " INNER JOIN categories c ON c.id = p.category_id ";
        $stmt = $con->prepare($query);

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        $productsList = [];
        while ($productDB = $result->fetch_object("Product")) {
            $productsList[] = $productDB;
        }

        return $productsList;
    }  

    public static function getProductsByCategory($category_id){

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM products WHERE category_id = ?");
        $stmt->bind_param("i", $category_id);

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        $productsList = [];
        while ($productDB = $result->fetch_object("Product")){
            $productsList[] = $productDB;
        }

        return $productsList;
    }

    public static function deleteProduct($id){
        $con = DB::connectDB();

        $stmt = $con->prepare("DELETE FROM products WHERE id=?");
        $stmt->bind_param("i", $id);

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }

    public static function updateProduct(Product $product){
        $con = DB::connectDB();

        $name = $product->getName();
        $category_id = $product->getCategory();
        $iva = $product->getIva();
        $base_price = $product->getBasePrice();
        $total_price = $product->getTotalPrice();
        $is_offer = $product->isOffer();
        $offer_price = $product->getOfferPrice();
        $total_offer_price = $product->getTotalOfferPrice();
        $img_path = $product->getImgPath();
        $id = $product->getId();

        $query = "UPDATE products ";
        $query .= "SET name = ?, ";
        $query .= "category_id = ?, ";
        $query .= "iva = ?, ";
        $query .= "base_price = ?, ";
        $query .= "total_price = ?, ";
        $query .= "is_offer = ?, ";
        $query .= "offer_price = ?, ";
        $query .= "total_offer_price = ?, ";
        $query .= "img_path = ? ";
        $query .= "WHERE id=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("siiddiddsi", $name, $category_id, $iva, $base_price, $total_price, $is_offer, $offer_price, $total_offer_price, $img_path, $id);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
        
    }

    public static function getProductById($id){
        //preparo la consulta
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM products WHERE id=?");
        $stmt->bind_param("i", $id);

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        return $result->fetch_object('Product');
        
    }

    public static function insertProduct(Product $product){
        $con = DB::connectDB();

        $name = $product->getName();
        $category_id = $product->getCategory();
        $iva = $product->getIva();
        $base_price = $product->getBasePrice();
        $total_price = $product->getTotalPrice();
        $is_offer = $product->isOffer();
        $offer_price = $product->getOfferPrice();
        $total_offer_price = $product->getTotalOfferPrice();
        $img_path = $product->getImgPath();

        $query = "INSERT INTO products (name, category_id, iva, base_price, total_price, is_offer, offer_price, total_offer_price, img_path)"; 
        $query .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($query);
        $stmt->bind_param("siiddidds", $name, $category_id, $iva, $base_price, $total_price, $is_offer, $offer_price, $total_offer_price, $img_path);

        $stmt->execute();

        $stmt->close();
        $con->close();
    }

    /*
    public static function getAllAllergens(){

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM allergens");

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        $allergensList = [];
        while ($allergensDB = $result->fetch_object("Allergen")) {
            $allergenList[] = $allergensDB;
        }

        return $allergenList;
    }
    */
}


?>