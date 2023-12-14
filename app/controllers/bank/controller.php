<?php

    require_once("../../models/bank.php");

    if (isset($_POST['submit'])) {
        $bank = new bank();
        $name = $_POST['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgName = $_FILES['image']['name'];
        $imgPath = '../../../public/assets/uploads/' . $imgName;
        $result = move_uploaded_file($imgTmp, $imgPath);
        if ($result) {

            if ($_POST['mode'] == "edit") {
                $id = $_POST["id"];
                $bank->updateBank($id, $name, $imgPath);
            } else {
                $bank->addBank($name, $imgPath);
            }
        } else {
            echo "File failed to upload";
        }


        echo "<br>";
        var_dump($_FILES['image']['tmp_name']);
        echo "<br>";
        var_dump($imgPath);
        echo "<br>";

        header('Location: ../../views/admin/bank.php');
    }

    if (isset($_GET['bankId'])) {
        $id = $_GET['bankId'];
        $bank = new bank();
        $bank->deleteBank($id);
        header('Location: ../../views/admin/bank.php');
    }

    $bank = new bank();

    $banks = $bank->displayBank();


?>