<?php
require_once('../../models/transaction.php');
$transaction_id=$_GET["transaction_id"];
$transaction = new Transaction();
$transaction->deleteTransaction($transaction_id);
header("Location: ../../views/admin/Transactions.php");

?>