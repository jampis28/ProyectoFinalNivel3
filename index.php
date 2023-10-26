<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/LoginController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/AdminController.php");

$controller = new LoginController();
$controller2 = new AdminController();

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

        case "/permisos":
            $controller2->permiso();
            break;

        case "/maestros":
            $controller2->maestro();
            break;

        case "/alumnos":
            $controller2->alumno();
            break;

        case "/clases":
            $controller2->clase();
            break;

        case "/log_out":
            $controller2->log_out();
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

        case "/alumno":
            $controller2->registrarlo($_POST);
            break;

            // case "/edit":
            //     $controller->editar($_POST);
            //     break;
        default:
            echo "No encontramos la URL";
            break;
    }
}
