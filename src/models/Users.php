<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Users
{
    public static function logearse($data)
    {
        $email = $data["email"];
        $contrasena = $data["contrasena"];
        try {
            $queryString = "SELECT * FROM usuarios WHERE email = '$email';";

            $res = DB::query($queryString);

            $res->rowCount() !== 1 && throw new Exception("No existe el Registro");

            $data = $res->fetch(PDO::FETCH_ASSOC);

            password_verify($contrasena, $data["contrasena"]) === false && throw new Exception("No existe el Registro");

            session_start();
            return ($_SESSION["user"] = $data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function all($rol_id)
    {
        $queryString = "SELECT * FROM usuarios WHERE rol_id = '$rol_id';";

        $res = DB::query($queryString);

        return $res;
    }
    public static function allmaestro()
    {
        $queryString = "CALL sp_maestro_clase();";

        $res = DB::query($queryString);

        return $res;
    }

    public static function allclase()
    {
        $queryString = "SELECT * FROM clases;";

        $res = DB::query($queryString);

        return $res;
    }

    public static function register($data)
    {
        try {
            extract($data);
            if (isset($dni, $email, $contrasena, $nombres, $apellidos, $direccion, $nacimiento) && $dni !== "" && $email !== "" && $contrasena !== "" && $nombres !== "" && $apellidos !== "" && $direccion !== "" && $nacimiento !== "") {
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $queryString = "INSERT INTO university.usuarios
            (dni, nombres, apellidos, email, contrasena, direccion, nacimiento, rol_id)
            VALUES('$dni', '$nombres', '$apellidos', '$email', '$hash', '$direccion', '$nacimiento', '$rol_id');";

                $res = DB::query($queryString);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function registermaestro($data)
    {
        try {
            extract($data);
            if (isset($email, $contrasena, $nombres, $apellidos, $direccion, $nacimiento)  && $email !== "" && $contrasena !== "" && $nombres !== "" && $apellidos !== "" && $direccion !== "" && $nacimiento !== "") {
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $queryString = "INSERT INTO university.usuarios
                (nombres, apellidos, email, contrasena, direccion, nacimiento, rol_id)
                VALUES('$nombres', '$apellidos', '$email', '$hash', '$direccion', '$nacimiento', '$rol_id');";

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

    public static function edit($id)
    {
        $queryString = "SELECT * FROM usuarios WHERE id = '$id';";

        $res = DB::query($queryString);

        return $res;
    }
    public static function editmaestro($id)
    {
        $queryString = "CALL sp_maestro_claseid('$id');";

        $res = DB::query($queryString);

        return $res;
    }

    public static function delete($id)
    {
        $res = DB::query("DELETE FROM usuarios WHERE id = $id");

        if ($res) {
            return true;
        }
    }
    public static function deletemaestro($id)
    {
        $res1 = DB::query("DELETE FROM clases_maestros WHERE maestro_id = $id");
        $res = DB::query("DELETE FROM usuarios WHERE id = $id");
        

        if ($res) {
            return true;
        }
    }


    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: /index.php");
    }
}
