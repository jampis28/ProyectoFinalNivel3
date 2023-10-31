<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Users
{
    public static function logearse($data)
    {
        $email = $data["email"];
        $contrasena = $data["contrasena"];
        try {
            $queryString = "call GetUsuarioInfoByEmail('$email');";

            $res = DB::query($queryString);

            $res->rowCount() !== 1 && throw new Exception("No existe el Registro");

            $data = $res->fetch(PDO::FETCH_ASSOC);

            password_verify($contrasena, $data["contrasena"]) === false && throw new Exception("Usuario y/o Contraseña Equivocada" . header("Location: /index.php"));

            session_start();
            return ($_SESSION["user"] = $data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /*              Traer la Base de Datos            */

    // TRAE ALUMNOS POR ROL_ID

    public static function all($rol_id)
    {
        $queryString = "SELECT * FROM usuarios WHERE rol_id = '$rol_id';";

        $res = DB::query($queryString);

        return $res;
    }

    // TRAE LOS MAESTROS POR PROCEDURE CON MATERIA DE TABLA CLASE

    public static function allmaestro()
    {
        $queryString = "CALL sp_maestro_clase();";

        $res = DB::query($queryString);

        return $res;
    }

    // TRAE TODAS LAS MATERIAS DE TABLA CLASE

    public static function allclase()
    {
        $queryString = "SELECT * FROM clases;";

        $res = DB::query($queryString);

        return $res;
    }

    // TRAE LAS MATERIAS CON ID Y EL NUMERO DE ALUMNOS INSCRITOS POR PROCEDURE 

    public static function allclases()
    {
        $queryString = "CALL ObtenerClasesConMaestrosYAlumnos();";

        $res = DB::query($queryString);

        return $res;
    }

    // TRAE DE LA TABLA USUARIOS EL ID Y EMAIL Y ACTIVE CON EL NOMBRE DEL ROL 

    public static function allpermiso()
    {
        $queryString = "call usuariopermiso();";

        $res = DB::query($queryString);

        return $res;
    }

    public static function allroles()
    {
        $queryString = "SELECT * FROM roles;";

        $res = DB::query($queryString);

        return $res;
    }




    /*                REGISTRA EN la Base de Datos              */

    //  REGISTRA LOS ALUMNOS EN TABLA USUARIOS

    public static function register($data)
    {
        try {
            extract($data);
            if (isset($dni, $email, $contrasena, $nombres, $apellidos, $direccion, $nacimiento, $active) && $dni !== "" && $email !== "" && $contrasena !== "" && $nombres !== "" && $apellidos !== "" && $direccion !== "" && $nacimiento !== "" && $active !== "") {
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $queryString = "INSERT INTO university.usuarios
            (dni, nombres, apellidos, email, contrasena, direccion, nacimiento, rol_id, active)
            VALUES('$dni', '$nombres', '$apellidos', '$email', '$hash', '$direccion', '$nacimiento', '$rol_id','$active');";

                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    //  REGISTRA LOS MAESTROS EN TABLA USUARIOS Y SU MATERIA EN TABLA CLASES_MAESTROS

    public static function registermaestro($data)
    {
        try {
            extract($data);
            if (isset($email, $contrasena, $nombres, $apellidos, $direccion, $nacimiento, $active)  && $email !== "" && $contrasena !== "" && $nombres !== "" && $apellidos !== "" && $direccion !== "" && $nacimiento !== "" && $active !== "") {
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $queryString = "INSERT INTO university.usuarios
                (nombres, apellidos, email, contrasena, direccion, nacimiento, rol_id, active)
                VALUES('$nombres', '$apellidos', '$email', '$hash', '$direccion', '$nacimiento', '$rol_id', '$active');";

                $res = DB::query($queryString);

                $queryString = "SELECT * FROM usuarios WHERE email = '$email';";
                $res = DB::query($queryString);
                $res->rowCount() !== 1 && throw new Exception("No existe el Registro");
                $data = $res->fetch(PDO::FETCH_ASSOC);
                $id = $data["id"];
                $queryString = "INSERT INTO university.clases_maestros
                (clase_id, maestro_id)
                VALUES('$clase_id', '$id');";
                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    //  REGISTRA LAS CLASES EN TABLA CLASE Y EN CLASES_MAESTRO

    public static function registerclase($data)
    {
        try {
            extract($data);
            if (isset($maestro, $clase)   && $maestro !== "" && $clase !== "") {
                $queryString = "INSERT INTO university.clases
                (nombre)
                VALUES('$clase');";

                $res = DB::query($queryString);

                $queryString = "SELECT * FROM clases WHERE nombre = '$clase';";
                $res = DB::query($queryString);
                $res->rowCount() !== 1 && throw new Exception("No existe el Registro");
                $data = $res->fetch(PDO::FETCH_ASSOC);
                $id = $data["id"];
                $queryString = "INSERT INTO university.clases_maestros
                (clase_id, maestro_id)
                VALUES('$id', '$maestro');";
                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }



    /*                EDITANDO EN la Base de Datos              */



    public static function editando($data)
    {
        extract($data);
        if (isset($email, $contrasena) && $email !== "" && $contrasena !== "") {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $queryString = "insert into logins(email,contrasena) values ('$email', '$hash')";

            $res = DB::query($queryString);
        }
        return $res;
    }

    // EDITAR ALUMNOS

    public static function edit($id)
    {
        $queryString = "SELECT * FROM usuarios WHERE id = '$id';";

        $res = DB::query($queryString);

        return $res;
    }

    public static function editaralumno($data)
    {
        try {
            extract($data);
            if (isset($dni, $email, $contrasena, $nombres, $apellidos, $direccion, $nacimiento, $id, $rol_id) && $contrasena !== "" && $rol_id !== "" && $id !== "" && $email !== "" && $nombres !== "" && $apellidos !== "" && $direccion !== "" && $nacimiento !== "") {
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $queryString = "UPDATE university.usuarios
                SET  dni='$dni', nombres='$nombres', apellidos='$apellidos', email='$email', contrasena='$hash', direccion='$direccion', nacimiento='$nacimiento'
                WHERE id='$id';";

                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }



    // EDITAR MAESTROS

    public static function editmaestro($id)
    {
        $queryString = "CALL sp_maestro_claseid('$id');";

        $res = DB::query($queryString);

        return $res;
    }

    public static function editarmaestro($data)
    {
        try {
            extract($data);
            if (isset($email, $nombres, $apellidos, $direccion, $nacimiento, $id, $rol_id, $contrasena) && $contrasena !== "" && $rol_id !== "" && $id !== "" && $email !== "" && $nombres !== "" && $apellidos !== "" && $direccion !== "" && $nacimiento !== "") {
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $queryString = "UPDATE university.usuarios
                SET   nombres='$nombres', apellidos='$apellidos', email='$email', contrasena='$hash', direccion='$direccion', nacimiento='$nacimiento'
                WHERE id='$id';";

                $res = DB::query($queryString);

                $queryString = "UPDATE university.clases_maestros
                SET clase_id='$clase_id', maestro_id='$id'
                WHERE maestro_id='$id';";
                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // EDITAR CLASES

    public static function editclase($id)
    {
        $queryString = "CALL ObtenerClaseConMaestroYAlumnosId('$id');";

        $res = DB::query($queryString);

        return $res;
    }

    public static function editarclase($data)
    {
        try {
            extract($data);
            if (isset($maestro, $clase)  && $maestro !== "" && $clase !== "") {
                $queryString = "UPDATE university.clases
                SET nombre='$clase'
                WHERE id='$id';";

                $res = DB::query($queryString);

                $queryString = "UPDATE university.clases_maestros
                SET maestro_id='$maestro'
                WHERE clase_id='$id';";
                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // EDITAR PERMISOS

    public static function editpermiso($id)
    {
        $queryString = "call usuariopermisoid('$id');";

        $res = DB::query($queryString);

        return $res;
    }

    public static function editarpermiso($data)
    {
        try {
            extract($data);
            $switch_value = isset($_POST["switch"]) ? $_POST["switch"] : "0";
            if (isset($rol_id, $email, $switch_value)  && $rol_id !== "" && $email !== "" && $switch_value !== "") {
                $queryString = "UPDATE university.usuarios
                SET rol_id='$rol_id', active='$switch_value', email='$email'  
                WHERE id='$id';";

                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    /*                ELIMINAR EN la Base de Datos              */

    // BORRAR LOS ALUMNOS 

    public static function delete($id)
    {
        $res = DB::query("DELETE FROM usuarios WHERE id = $id");

        if ($res) {
            return true;
        }
    }

    // BORRAR MAESTROS Y LA MATERIA A LA QUE ESTABA ASIGNADO

    public static function deletemaestro($id)
    {
        $res1 = DB::query("DELETE FROM clases_maestros WHERE maestro_id = $id");
        $res = DB::query("DELETE FROM usuarios WHERE id = $id");


        if ($res) {
            return true;
        }
    }

    // BORRAR CLASES 

    public static function deleteclases($id)
    {
        $res = DB::query("DELETE FROM clases_maestros WHERE clase_id = $id");
        $res2 = DB::query("DELETE FROM alumnos_clases WHERE clase_id = $id");
        $res1 = DB::query("DELETE FROM clases WHERE id = $id");


        if ($res1) {
            return true;
        }
    }





    /*-------------------------------------CRUD DE USUARIOS ALUMNOS---------------------------*/


    public static function allmateriaalumno($id)
    {
        $queryString = "call materiasdealumnosporid('$id');";
        $res = DB::query($queryString);

        return $res;
    }

    public static function alumnosclases($data)
    {
        try {
            $alumno_id = $data["alumno_id"];

            for ($i = 0; $i < count($data["clases"]); $i++) {
                $clase_id = $data["clases"][$i];
                if (isset($alumno_id, $clase_id)  && $alumno_id !== "" && $clase_id !== "") {
                    $queryString = "INSERT INTO university.alumnos_clases
                    (alumno_id, clase_id)
                    VALUES('$alumno_id', '$clase_id');";
                    $res = DB::query($queryString);
                }
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // BORRAR ALUMNOS CLASES 

    public static function deletealumnosclases($id)
    {
        $res = DB::query("DELETE FROM alumnos_clases WHERE id = '$id';");

        if ($res) {
            return true;
        }
    }

 /*-------------------------------------CRUD DE USUARIOS MESTROS---------------------------*/

    public static function allmateriasmaestros($id)
    {
        $queryString = "select * from clases c where c.id not in (select ac.clase_id  from alumnos_clases ac where ac.alumno_id ='$id');";
        $res = DB::query($queryString);

        return $res;
    }

    public static function allalumnosmaestros($id)
    {
        $queryString = "call alumnosinscritosporid('$id');";
        $res = DB::query($queryString);

        return $res;
    }


}
