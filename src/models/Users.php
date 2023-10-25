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
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function all($id)
    {
        $queryString = "SELECT * FROM logins WHERE id = $id";

        $res = DB::query($queryString);

        return $res;
    }

    public static function register($data)
    {
        extract($data);
        if (isset($email, $contrasena) && $email !== "" && $contrasena !== "") {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $queryString = "insert into logins(email,contrasena) values ('$email', '$hash')";

            $res = DB::query($queryString);
        }
        return $res;
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
    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: /index.php");
    }
}
