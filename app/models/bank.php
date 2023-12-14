<?php

require_once('DataProvider.php');

class bank extends DataProvider {

   public function addBank($name, $logo){
    $db=$this->connect();
    if($db==null){
        return null;
   }
   $sql= 'INSERT INTO bank (name,logo) VALUES(:name, :logo)';
   $stmt = $db->prepare($sql);
   $stmt->execute([
    ":name" => $name,
    ":logo" => $logo
   ]);
   $db=null;
   $stmt=null;
}


public function displayBank(){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query = $db->query('SELECT * FROM bank');

   $data_banks=$query->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_banks;
}




public function updateBank($bankId, $name, $logo) {
      
    $db = $this->connect();

    if($db == null) {
        return;
    }

    $sql = "UPDATE bank SET name = :name, logo = :logo WHERE bankId = :bankId";

    $stmt = $db->prepare($sql);

    $stmt->execute([
    ':name'=> $name,
    ":bankId" => $bankId,
    ":logo" => $logo
       ]);

    $stmt = null;
    $db = null;
}

public function deleteBank($bankId) {
  
    $db = $this->connect();

    if($db == null) {
        return;
    }

    $sql = "DELETE FROM bank WHERE bankId = :bankId";

    $smt = $db->prepare($sql);

    $smt->execute([
        ":bankId" => $bankId
    ]);

    $smt = null;
    $db = null;
}

}


?>