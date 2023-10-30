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
                $data = $this->allpermisos();
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
                $data = $this->allmaestro();
                $clases =  $this->allclases();
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
                $data =  $this->allclase();
                $maestros = $this->all(2);
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


    /*                   VISTA PARA EDITAR ES MODAL             */

    // VISTA ALUMNO EDITAR

    public function alumnoedit($id)
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                $data = $this->all(3);
                $datauser = $this->editar($id);
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/alumnos/edit.php";
                break;
            case 2:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/alumnos.php";
                break;

            default:
                echo "No se encontro ese ruta";
                break;
        }
    }

    // VISTA MAESTRO EDITAR

    public function maestroedit($id)
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                $data = $this->allmaestro();
                $clases =  $this->allclases();
                $datauser = $this->editarmaestro($id);
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/maestros/edit.php";
                break;
            case 2:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/alumnos.php";
                break;

            default:
                echo "No se encontro ese ruta";
                break;
        }
    }

    // VISTA CLASE EDITAR

    public function claseedit($id)
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                $data =  $this->allclase();
                $maestros = $this->all(2);
                $claseid = $this->editarclase($id);
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/clases/edit.php";
                break;
            case 2:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/alumnos.php";
                break;

            default:
                echo "No se encontro ese ruta";
                break;
        }
    }

    // VISTA PERMISO EDITAR

    public function permisoedit($id)
    {
        session_start();
        switch ($_SESSION["user"]["rol_id"]) {
            case 1:
                $data = $this->allpermisos();
                $roles = $this->allroles();
                $claseid = $this->editarpermiso($id);
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/permisos/edit.php";
                break;
            case 2:
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/alumnos.php";
                break;

            default:
                echo "No se encontro ese ruta";
                break;
        }
    }

    /*                 HACIENDO CRUD DE CUENTA ADMIN           */


    //Realizar los CRUD ALUMNOS

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

    public function editar($request)
    {
        $res = Users::edit($request);
        $datauser = $res->fetch(PDO::FETCH_ASSOC);
        return $datauser;
    }

    public function editaralumno($request)
    {
        Users::editaralumno($request);
        $this->alumno();
    }

    public function delete($id)
    {
        $deleted = Users::delete($id);
        header("Location: /alumnos");
    }


    //Realizar los CRUD mAESTRO

    public function allclases()
    {
        $res = Users::allclase();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function allmaestro()
    {
        $res = Users::allmaestro();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function registrarlomaestro($request)
    {
        $data = Users::registermaestro($request);
        $this->maestro();
    }

    public function editarmaestro($request)
    {
        $res = Users::editmaestro($request);
        $datauser = $res->fetch(PDO::FETCH_ASSOC);
        return $datauser;
    }

    public function editandomaestro($request)
    {
        Users::editarmaestro($request);
        $this->maestro();
    }

    public function deletemaestro($id)
    {
        $deleted = Users::deletemaestro($id);
        header("Location: /maestros");
    }


    //Realizar los CRUD CLASES

    public function allclase()
    {
        $res = Users::allclases();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function registrarloclase($request)
    {
        $data = Users::registerclase($request);
        $this->clase();
    }

    public function editarclase($request)
    {
        $res = Users::editclase($request);
        $datauser = $res->fetch(PDO::FETCH_ASSOC);
        return $datauser;
    }

    public function editandoclase($request)
    {
        Users::editarclase($request);
        $this->clase();
    }

    public function deleteclase($id)
    {
        $deleted = Users::deleteclases($id);
        header("Location: /clases");
    }


    //Realizar los CRUD PERMISO

    public function allpermisos()
    {
        $res = Users::allpermiso();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function allroles()
    {
        $res = Users::allroles();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function editarpermiso($request)
    {
        $res = Users::editpermiso($request);
        $datauser = $res->fetch(PDO::FETCH_ASSOC);
        return $datauser;
    }

    public function editandopermiso($request)
    {
        Users::editarpermiso($request);
        $this->permiso();
    }
    //LOG_OUT

    public function log_out()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/log_out.php";
    }
}
