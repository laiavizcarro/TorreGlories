<?php

class PriceCalculator {
    public static function calculateProductTotalPrice($orderLine) {
        return PriceCalculator::fixDecimal($orderLine->getProduct()->getTotalPrice() * $orderLine->getQuantity());
    }

    public static function calculateOrderTotalPrice($order) {
        $totalPrice = 0;

        foreach($order as $orderLine) {
            $totalPrice += $orderLine->getProduct()->getTotalPrice() * $orderLine->getQuantity();
        }

        return PriceCalculator::fixDecimal($totalPrice);
    }

    public static function fixDecimal($qty) {
        return number_format((float)$qty, 2, '.', '');
    }

    public static function getIvaCalculation($iva) {
        switch ($iva) {
            case "4":
                return 1.04;
                break;
            case "10":
                return 1.10;
                break;
            case "21":
                return 1.21;
                break;
            default:
                return 1.00;
                break;
        }
    }
}

?>