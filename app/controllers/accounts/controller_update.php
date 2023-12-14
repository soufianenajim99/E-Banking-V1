<?php

    require_once '../../models/accounts.php';
    require_once '../../models/DataProvider.php';

    $balance = $_POST['Balance'];
    $rib = $_POST['rib'];
    $accountID = $_POST['accountOwner'];


    $editAccount = new Accounts();
    $editAccount->updateAccount($balance , $rib , $accountID);

    redirect('../../views/admin/Accounts.php');



?>
