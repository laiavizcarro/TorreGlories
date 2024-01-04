<?php

class DB {

    /**
     * Funció per a connectar-se amb la BBDD
     * 
     * @param string $host  Host de la base de dades
     * @param string $user  User de la connexió
     * @param string $pwd   Password de la connexió
     * @param string $db    Nom de la base de dades
     * 
     * @return Mysqli
     */
    public static function connectDB($host = 'localhost', $user = 'root', 
        $pwd = '', $db = 'torreGlories') {
        $con = new mysqli($host,$user,$pwd,$db);

        if ($con == false) {
            die('Oops! It seems we have a problem in our Database, try again later please.');
        }

        return $con;

    }
}

?>