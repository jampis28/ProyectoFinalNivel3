<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/models/Users.php");

class AdminController
{
    //Mostrar las vistas 
    public function permiso()
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/permisos.php";
                break;
            default:
                echo "No se encontro ese ruta";
                break;
        }
    }
    public function maestro()
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/maestros.php";
                break;
            default:
                echo "No se encontro ese ruta";
                break;
        }
    }
    public function alumno()
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                $data = $this->all(3);
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/alumnos.php";

                break;
            case 2:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/alumnos.php";
                break;

            default:
                echo "No se encontro ese ruta";
                break;
        }
    }
    public function clase()
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/clases.php";
                break;
            case 3:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Alumno/clases.php";
                break;

            default:
                echo "No se encontro ese ruta";
                break;
        }
    }
    public function log_out()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/log_out.php";
    }



    //Realizar los CRUD
    public function all($rol_id)
    {
        $res = Users::all($rol_id);
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
       return $data;
    } 

    public function registrarlo($request)
    {
        $data = Users::register($request);
            $this->alumno();
    } 
}
