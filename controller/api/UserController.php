<?php

include_once 'utils/Utils.php';
include_once 'model/User.php';
include_once 'model/UserDAO.php';

/**
 * Obté tots els productes de la base de dades
 */
class UserController {

    /**
     * Constructor
     */
    function __construct() {
        // Iniciem la sessió en el cas de que no s'hagi inicialitzat.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getUserPoints() {
        $user = UserDAO::getUserByEmail($_SESSION['email']);

        echo json_encode([
            "success" => true,
            "message" => null,
            "data" => [
                'points' => $user->getPoints()
            ]
        ]);

        return;
    }

}

?>

