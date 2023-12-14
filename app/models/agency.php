<?php

require_once('DataProvider.php');


class Agency extends DataProvider {
   public function addAgence($longitude, $latitude,$bankId,$ville, $quartier,$rue,$codePostal,$email,$phone){
    $db=$this->connect();
    if($db==null){
        return null;
   }
   $sql= 'START TRANSACTION;

   INSERT INTO adress (ville, quartier,rue,codePostal,email,phone)
   VALUES (:ville, :quartier,:rue,:codePostal,:email,:phone);

   SET @adressId = LAST_INSERT_ID();

   INSERT INTO agency (longitude, latitude, bankId,adrId)
   VALUES (:longitude,:latitude,:bankId,@adressId);

  COMMIT;';
   $stmt = $db->prepare($sql);
   $stmt->execute([
    ":longitude" => $longitude,
    ":latitude" => $latitude,
    ":ville"=> $ville,
    ":quartier"=> $quartier,
    ":rue"=> $rue,
    ":codePostal"=> $codePostal,
    ":email"=> $email,
    ":phone"=> $phone,
    ":bankId"=>$bankId
   ]);
   $db=null;
   $stmt=null;
}


public function displayAgency(){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query = $db->query('SELECT 
   agency.agencyId,
   agency.longitude,
   agency.latitude,
   bank.name
FROM agency
JOIN bank ON agency.bankId = bank.bankId;');

   $data_agence=$query->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_agence;
}




public function updateAgence($id,$longitude, $latitude,$bankId,$ville, $quartier,$rue,$codePostal,$email,$phone) {
      
    $db = $this->connect();

    if($db == null) {
        return;
    }

    $sql = "UPDATE agency SET longitude = :longitude, latitude = :latitude, bankId = :bankId  WHERE agencyId = :id;
    UPDATE adress SET ville = :ville, quartier = :quartier, rue = :rue, codePostal= :codePostal , email=:email , phone= :phone WHERE adrId IN (SELECT adrId FROM agency WHERE agencyId = :id) ;";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        ":longitude" => $longitude,
        ":latitude" => $latitude,
        ":ville"=> $ville,
        ":quartier"=> $quartier,
        ":rue"=> $rue,
        ":codePostal"=> $codePostal,
        ":email"=> $email,
        ":phone"=> $phone,
        ":bankId"=>$bankId,
        ":id"=> $id
       ]);

    $stmt = null;
    $db = null;
}

public function deleteAgence($id) {
  
    $db = $this->connect();

    if($db == null) {
        return;
    }

    $sql = "DELETE FROM agency WHERE agencyId = :id";

    $smt = $db->prepare($sql);

    $smt->execute([
        ":id" => $id
    ]);

    $smt = null;
    $db = null;
}

public function displayAgencyOne($id){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query ='SELECT 
   agency.*,
   adress.*,
   bank.*
FROM agency
JOIN bank ON agency.bankId = bank.bankId
JOIN adress ON agency.adrid = adress.adrid
WHERE agency.agencyId = :id;';

$stmt = $db->prepare($query);
$stmt->execute([
    "id"=> $id,]);


   $data_agence=$stmt->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_agence;
}






}




?>