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

        case "/alumnosedit":
            $controller2->alumnoedit($_GET["id"]);
            break;

        case "/maestroedit":
            $controller2->maestroedit($_GET["id"]);
            break;

        case "/clases":
            $controller2->clase();
            break;

        case "/claseedit":
            $controller2->claseedit($_GET["id"]);
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

        case "/alumnosedit":
            $controller2->editaralumno($_POST);
            break;

        case "/maestro":
            $controller2->registrarlomaestro($_POST);
            break;

        case "/maestroedit":
            $controller2->editandomaestro($_POST);
            break;

        case "/clase":
            $controller2->registrarloclase($_POST);
            break;

        case "/claseedit":
            $controller2->editandoclase($_POST);
            break;

        case "/delete":
            $controller2->delete($_POST["alumno_id"]);
            break;

        case "/deletemaestro":
            $controller2->deletemaestro($_POST["maestro_id"]);
            break;

        case "/deleteclase":
            $controller2->deleteclase($_POST["clase_id"]);
            break;



            // case "/alumnoedit":
            //   $datauser = $controller2->editar($_POST);
            // break;
            // default:
            echo "No encontramos la URL";
            break;
    }
}
