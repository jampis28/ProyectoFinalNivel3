<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/LoginController.php");

$controller = new LoginController();

// ----- URL del navegador -----
$urlCompleta = $_SERVER["REQUEST_URI"];
// Cortamos la URL para que no muestre los query params "/edit?id=1"
$urlPartida = explode("?", $urlCompleta);
// Tomamos la primera posición porque esa es la que representa la acción "/create", "/index.php", etc...
$url = $urlPartida[0];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    switch ($url) {
        case "/index.php":
            $controller->index();
            break;

        default:
            echo "No encontramos la URL";
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($url) {
        case "/login":
            $controller->login($_POST);
            break;

            // case "/registrado":
            //     $controller->registrarlo($_POST);
            //     break;

            // case "/edit":
            //     $controller->editar($_POST);
            //     break;
        default:
            echo "No encontramos la URL";
            break;
    }
}
