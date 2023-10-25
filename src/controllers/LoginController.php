<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/models/Users.php");

class LoginController
{
    //Mostrar las vistas 
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/login.php";
    }



    //Realizar los CRUD
    public function login($request)
    {
        $data = Users::logearse($request);
        if ($data) {
                switch ($_SESSION["user"]["rol_id"]) {
                    case 1:
                        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/dashboard.php";
                        break;
                    case 2:
                        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/dashboard.php";
                        break;
                    case 3:
                        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Alumno/dashboard.php";
                        break;

                    default:
                        echo "No se encontro ese rol";
                        break;
                }
        }else {
            echo "Contraseña Incorrecta";
            header("Location: /index.php");
       }
    }
}