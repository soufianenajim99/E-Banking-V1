<?php 

    require_once("../../models/DataProvider.php");

    session_start();

    if (!isset($_SESSION["username"]) || $_SESSION["role"] != ("subadmin" || "admin")){
        redirect("../../views/login.php",false);
    }

?>