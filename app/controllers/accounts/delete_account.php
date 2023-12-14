<?php 

    require_once '../../models/accounts.php';
    require_once '../../models/DataProvider.php';


    $accountID = $_GET['id'];

    $deleteAccout = new Accounts();

    $deleteAccout->deleteAccount($accountID);

    redirect('../../views/admin/Accounts.php', false);








?>