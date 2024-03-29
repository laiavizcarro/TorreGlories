<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mantindre totes les cookies 1h després de reiniciar el navegador.
session_set_cookie_params(time() + 3600);

// Importem tots els scripts necessaris.
include_once 'config/parameters.php';
include_once 'utils/PriceCalculator.php';
include_once 'controller/ProductController.php';
include_once 'controller/HomeController.php';
include_once 'controller/OrderController.php';
include_once 'controller/UserController.php';
include_once 'controller/ProfileController.php';
include_once 'controller/ReviewController.php';
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Torre Glòries</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">

</head>

<body>
    <?php include_once 'view/header.php'; ?>

    <main>
    <?php
        if (!isset($_GET['controller'])) {
            //si no es passa res, es mostrarà la home
            header("Location:" . url. '?controller=Home');
        } else {
            $controller_name = $_GET['controller'].'Controller';

            if (class_exists($controller_name)) {
                //mirem si ens passa una accio
                //en cas contrari mostrem una accio per defecte
                $controller = new $controller_name;

                if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
                    $action = $_GET['action'];
                }else{
                    $action = default_action;
                }
                $controller->$action();
            } else {
                header("Location:" . url. '?controller=Home');
            }
        }
    ?>
    </main>

    <?php include_once 'view/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.0/dist/qrcode.min.js"></script>
    <script src="https://unpkg.com/notie"></script>


</body>
</html>