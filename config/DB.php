<?php
class DB
{
    public static function connect()
    {
        $dsn = "mysql:host=localhost;dbname=university";
        $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];

        $pdo = new PDO($dsn, "root", "", $options);

        return $pdo;
    }

    public static function query($string)
    {
        $pdo = DB::connect();
        $res = $pdo->query($string);

        return $res;
    }
}
