<?php

require_once('DataProvider.php');


class Transaction extends DataProvider {
   public function addTransaction($type, $amount,$accountId){
    $db=$this->connect();
    if($db==null){
        return null;
   }
   $sql= 'INSERT INTO transactions (type, amount, accountId) VALUES (:type, :amount, :accountId)';
   $stmt = $db->prepare($sql);
   $stmt->execute([
    ":type" => $type,
    ":amount" => $amount,
    ":accountId"=> $accountId
   ]);
   $db=null;
   $stmt=null;
}


public function displayTransaction(){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query = $db->query('SELECT transactions.*, users.username
   FROM transactions
   JOIN account ON transactions.accountId = account.accountId
   JOIN users ON account.userId = users.userId;
   ');

   $data_trans=$query->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_trans;
}


public function deleteTransaction($id) {
  
    $db = $this->connect();

    if($db == null) {
        return;
    }

    $sql = "DELETE FROM transactions WHERE transactionId = :id";

    $smt = $db->prepare($sql);

    $smt->execute([
        ":id" => $id
    ]);

    $smt = null;
    $db = null;
}




}




?>