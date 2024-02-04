<?php
include_once 'utils/Utils.php';
include_once 'utils/PriceCalculator.php';
include_once 'model/OrderSession.php';
include_once 'model/Order.php';
include_once 'model/OrderDAO.php';
include_once 'model/OrderProduct.php';
include_once 'model/OrderProductDAO.php';
include_once 'config/parameters.php';

class TipController {
    public function getTips() {
        $tip = isset($_POST['tip'])? $_POST['tip'] : null;
    }

    
}

?>