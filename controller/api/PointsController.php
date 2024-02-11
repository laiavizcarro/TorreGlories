<?php
include_once 'utils/Utils.php';
include_once 'utils/PriceCalculator.php';
include_once 'model/OrderSession.php';
include_once 'model/Order.php';
include_once 'model/OrderDAO.php';
include_once 'model/OrderProduct.php';
include_once 'model/OrderProductDAO.php';
include_once 'config/parameters.php';

class PointsController {
    public function getGeneratedPoints() {
        $point = isset($_POST['generated_points'])? $_POST['generated_points'] : null;
    }

    
}

?>