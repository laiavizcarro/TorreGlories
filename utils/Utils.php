<?php

/**
 * Classe utilitaria Utils
 * 
 * Conté diversos mètodes d'utilitats
 */
class Utils {

    public static function toJsonArray($array) {
        $result = [];

        foreach ($array as $current) {
            array_push($result, (array) $current);
        }
        
        return $result;
    }

}