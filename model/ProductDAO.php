<?php
include_once 'config/db.php';
include_once 'model/Product.php';

class ProductDAO {

    public static function getAllProducts(){

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM products");

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

        $stmt = $con->prepare("SELECT * FROM products WHERE category_id=?");
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

    public static function updateProduct($product){
        $con = DB::connectDB();

        $query = "UPDATE products ";
        $query .= "SET name = ?, ";
        $query .= "category_id = ?, ";
        $query .= "stock = ?, ";
        $query .= "iva = ?, ";
        $query .= "base_price = ?, ";
        $query .= "total_price = ?, ";
        $query .= "is_offer = ?, ";
        $query .= "offer_price = ?, ";
        $query .= "total_offer_price = ? ";
        $query .= "WHERE id=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("siiiiiiiii", 
            $product->getName(),
            $product->getCategory(),
            $product->getStock(),
            $product->getIva(),
            $product->getBase_price(),
            $product->getTotal_price(),
            $product->getIs_offer(),
            $product->getOffer_price(),
            $product->getTotal_offer_price(),
            $product->getId()
        );

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

    public static function insertProduct(){
        $con = DB::connectDB();

        if(isset($_POST['name'], $_POST['category_id'], $_POST['stock'], $_POST['iva'], $_POST['base_price'], $_POST['total_price'], 
            $_POST['is_offer'], $_POST['offer_price'], $_POST['total_offer_price'])) {
                $name = $_POST['name'];
                $category_id = $_POST['category_id'];
                $stock = $_POST['stock'];
                $iva = $_POST['iva'];
                $base_price = $_POST['base_price'];
                $total_price = $_POST['total_price'];
                $is_offer = $_POST['is_offer'];
                $offer_price = $_POST['offer_price'];
                $total_offer_price = $_POST['total_offer_price'];
            
                $query = "INSERT INTO products (name, category_id, stock, iva, base_price, total_price, is_offer, offer_price, total_offer_price)"; 
                $query .= "VALUES ($name, $category_id, $stock, $iva, $base_price, $total_price, $is_offer, $offer_price, $total_offer_price)";
        }
                
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