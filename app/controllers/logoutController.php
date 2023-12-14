<?php
    require_once("../models/DataProvider.php");

    session_start();
    session_unset();
    session_destroy();
    redirect("../views/login.php",false);


?>