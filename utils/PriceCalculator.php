<?php

/**
 * Classe utilitaria PriceCalculator
 * 
 * Conté diversos mètodes d'utilitats per calcular preus de cistelles, IVA i
 * formatar els seus decimals
 */
class PriceCalculator {

    /**
     * Calcular el preu total d'una línia de la cistella
     */
    public static function calculateProductTotalPrice($orderLine) {
        return $orderLine->getProduct()->isOffer()
            ? PriceCalculator::fixDecimal($orderLine->getProduct()->getTotalOfferPrice() * $orderLine->getQuantity())
            : PriceCalculator::fixDecimal($orderLine->getProduct()->getTotalPrice() * $orderLine->getQuantity());
    }

    /**
     * Calcular el preu total de la cistella
     */
    public static function calculateOrderTotalPrice($order) {
        $totalPrice = 0;

        foreach($order as $orderLine) {
            $totalPrice += $orderLine->getProduct()->isOffer()
                ? $orderLine->getProduct()->getTotalOfferPrice() * $orderLine->getQuantity()
                : $totalPrice += $orderLine->getProduct()->getTotalPrice() * $orderLine->getQuantity();
        }

        return PriceCalculator::fixDecimal($totalPrice);
    }

    /**
     * Formatar els decimals
     */
    public static function fixDecimal($qty) {
        return number_format((float)$qty, 2, '.', '');
    }

    /**
     * Obtindre el càlcul de l'IVA a partir del seu percentatge
     */
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