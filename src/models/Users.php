<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Users
{
    public static function all()
    {
        $queryString = "SELECT * FROM logins;";

        $res = DB::query($queryString);

        return $res;
    }

    public static function register($data)
    {
        try {
            extract($data);
            if (isset($email, $contrasena) && $email !== "" && $contrasena !== "" && $nombre !== "") {
                $queryString = "insert into logins(email,contrasena,names) values ('$email', '$contrasena','$nombre')";
                $res = DB::query($queryString);
                if ($res) {
                    return true;
                }
            }
        } catch (PDOException $th) {
            echo "Error al Guardar". $th->getMessage();
            header("Location: /index.php");
        }
        
    }
}
