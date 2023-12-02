<?php

class PriceCalculator {
    public static function calculateProductTotalPrice($orderLine) {
        return PriceCalculator::fixDecimal($orderLine->getProduct()->getTotal_Price() * $orderLine->getQuantity());
    }

    public static function calculateOrderTotalPrice($order) {
        $totalPrice = 0;

        foreach($order as $orderLine) {
            $totalPrice += $orderLine->getProduct()->getTotal_Price() * $orderLine->getQuantity();
        }

        return PriceCalculator::fixDecimal($totalPrice);
    }

    public static function fixDecimal($qty) {
        return number_format((float)$qty, 2, '.', '');
    }
}

6.17

?>