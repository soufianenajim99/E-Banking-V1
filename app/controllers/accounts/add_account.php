<?php  

require_once '../../models/accounts.php';
require_once '../../models/DataProvider.php';


$newAccount = new Accounts();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $balance = $_POST['Balance'];
    // $rib = $_POST['rib'];
    $rib = (date("Ymdhis")+date("Ymdhis"))*345;
    
    $userID = $_POST['accountOwner'];
    
    $newAccount->addAccount($balance , $rib , $userID);
}

redirect('../../views/admin/Accounts.php', false);



?>