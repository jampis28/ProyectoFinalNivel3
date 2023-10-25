<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/models/Users.php");

class LoginController
{
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/login.php";
    }
   
}
