<?php

    require_once("../../models/distributer.php");
    require_once("../../models/bank.php");

    if (isset($_POST['submit'])) {
        $distributer = new Distributer();
        $address = $_POST['address'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $bank = $_POST['bank'];

        if ($_POST['mode'] == "edit") {
            $id = $_POST["id"];
            $distributer->update($id, $address, $longitude, $latitude);
        } else {
            $distributer->insert($address, $longitude, $latitude, $bank);
        }



        var_dump($_POST['mode']);
        var_dump($_POST['address']);
        var_dump($_POST['longitude']);
        var_dump($_POST['latitude']);
        var_dump($_POST['bank']);
        echo "hello";

        header('Location: ../../views/admin/Distributer.php');
    }

    if (isset($_GET['bankId'])) {
        $id = $_GET['bankId'];
        $distributer = new Distributer();
        $distributer->delete($id);
        header('Location: ../../views/admin/Distributer.php');
    }

    $distributer = new Distributer();
    $bank = new bank();

    $distributers = $distributer->display();
    $banks = $bank->displayBank();

?>