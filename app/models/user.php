<?php

require_once('DataProvider.php');

class Users extends DataProvider {
    private $Idd;
   public function addUser($username,$pw,$gendre,$roleName,$ville, $quartier,$rue,$codePostal,$email,$phone,$agencyId) {
    $db=$this->connect();
    if($db==null){
        return null;
   }
   $sql= 'START TRANSACTION;


   INSERT INTO adress (ville, quartier,rue,codePostal,email,phone)
   VALUES (:ville, :quartier,:rue,:codePostal,:email,:phone);

   SET @adressId = LAST_INSERT_ID();

        INSERT INTO users (username, pw, gendre,agencyId,adrId,delete_check)
         VALUES (:username,:pw,:gendre,:agencyId,@adressId,1);

   
         SET @userId = LAST_INSERT_ID();
   
        INSERT INTO roleofuser (userId, roleName)
        VALUES (@userId, :roleName);

   
        COMMIT;';
   $stmt = $db->prepare($sql);
   $stmt->execute([
    ':username'=> $username,
    ":pw" => $pw,
    ":gendre" => $gendre,
    ":agencyId" => $agencyId,
    ":roleName" => $roleName,
    ":ville"=> $ville,
    ":quartier"=> $quartier,
    ":rue"=> $rue,
    ":codePostal"=> $codePostal,
    ":email"=> $email,
    ":phone"=> $phone
   ]);
   $db=null;
   $stmt=null;

//    $sql = "SELECT max(userId) FROM users";
//    $stmt = $db->query($sql);

}


// public function addRole($role){
//     $db=$this->connect();
//     $sql= "INSERT INTO roleofuser (userId, roleName) VALUES (max(userId), :roleName)";

//     $stmt = $db->prepare($sql);
//     $stmt->execute([
//         // ':userId'=> $userId,
//         ":roleName" => $role
//        ]);
// }
public function addMultiRoles($userId,$roleName){
    $db=$this->connect();
    if($db==null){
        return null;
   }
   $sql= "INSERT INTO roleofuser (userId, roleName)
            VALUES (:userId, :roleName);";

$stmt = $db->prepare($sql);
$stmt->execute([
 ':userId'=> $userId,
 ":roleName" => $roleName
]);
$db=null;
$stmt=null;
}



public function displayUser(){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query = $db->query('SELECT 
   users.userId,
   users.username,
   users.agencyId,
   adress.email,
   roleofuser.roleName
FROM users
JOIN roleofuser ON users.userId = roleofuser.userId
JOIN agency ON users.agencyId = agency.agencyId
JOIN adress
WHERE users.adrId = adress.adrId AND delete_check=1
;');

   $data_users=$query->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_users;
}



public function displayUserRole($id){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query = $db->query('SELECT roleName FROM roleofuser WHERE userId=:id;');

   $stmt = $db->prepare($query);
   $stmt->execute([
    "id"=> $id,]);

    $data_role=$stmt->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_role;
}


public function lastUserId(){
    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query = $db->query('SELECT MAX(userId) FROM users');
    
   $data_usersId=$query->fetchAll(PDO::FETCH_OBJ);
   $query = null;
   $db=null;
   return $data_usersId;
}




public function updateUser($id,$username,$pw,$gendre,$agencyId,$roleName,$ville, $quartier,$rue,$codePostal,$email,$phone) {
      
    $db = $this->connect();

    if($db == null) {
        return;
    }

    $sql = "UPDATE users SET username = :username, pw = :pw, gendre = :gendre , agencyId = :agencyId  WHERE userId = :id;
    UPDATE adress SET ville = :ville, quartier = :quartier, rue = :rue, codePostal= :codePostal , email=:email , phone= :phone WHERE adrId IN (SELECT adrId FROM users WHERE userId = :id); ;
    UPDATE roleofuser SET roleName = :roleName WHERE userId = :id ;";

    $stmt = $db->prepare($sql);

    $stmt->execute([
    "id"=> $id,
    ':username'=> $username,
    ":pw" => $pw,
    ":gendre" => $gendre,
    ":agencyId" => $agencyId,
    ":roleName" => $roleName,
    ":ville"=> $ville,
    ":quartier"=> $quartier,
    ":rue"=> $rue,
    ":codePostal"=> $codePostal,
    ":email"=> $email,
    ":phone"=> $phone
       ]);

    $stmt = null;
    $db = null;
}




public function displayUserOne($id){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query ='SELECT 
   users.*,
   adress.*,
   roleofuser.*
   
FROM users
JOIN roleofuser ON users.userId = roleofuser.userId
JOIN adress ON users.adrid = adress.adrid
WHERE users.userId = :id;

';

$stmt = $db->prepare($query);
$stmt->execute([
    "id"=> $id,]);

   $data_user=$stmt->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_user;
}













public function deleteUser($id) {
  
    $db = $this->connect();

    if($db == null) {
        return null;
    }

    // $sql = "DELETE FROM users WHERE userId = :id";
    $sql = "UPDATE users SET delete_check = '0' WHERE userId = :id";


    $smt = $db->prepare($sql);

    $smt->execute([
        ":id" => $id
    ]);

    $smt = null;
    $db = null;
}





public function displayUserAcc($id){

    $db=$this->connect();
    if($db==null){
        return null;
   }

$query = 'SELECT users.username, account.*
FROM users
JOIN account ON users.userId = account.userId
WHERE users.userId = :id ';


$stmt = $db->prepare($query);
$stmt->execute([
    "id"=> $id,]);

   $acc_user=$stmt->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $acc_user;
}

public function getUserByUsername($username){

    $db = $this->connect();

    if ($db == null){
        return null;
    }

    $query = "SELECT * FROM users WHERE username = :username";

    $stmt = $db->prepare($query);

    $stmt->execute([
        ":username" => $username
    ]);

    $data = null;

    $data = $stmt->fetch(PDO::FETCH_OBJ);

    $query = null;
    $db = null;
    return $data;

}

public function getRoleByUsername($username){

    $db = $this->connect();

    if ($db == null){
        return null;
    }

    $query = "SELECT roleofuser.roleName FROM users JOIN roleofuser ON users.userId = roleofuser.userId WHERE users.username = :username";

    $stmt = $db->prepare($query);

    $stmt->execute([
        ":username" => $username
    ]);

    $data = null;

    $data = $stmt->fetch(PDO::FETCH_OBJ);

    $query = null;
    $db = null;
    return $data;

}



public function displayUserPermission($id){

    $db=$this->connect();
    if($db==null){
        return null;
   }

   $query = "SELECT 
   users.userId,
   users.username,
   rolepermissions.permission_name,
   roleofuser.roleName
FROM users
JOIN roleofuser ON users.userId = roleofuser.userId
JOIN rolepermissions ON roleofuser.roleName = rolepermissions.role_name
WHERE users.userId = :id";

   $stmt=$db->prepare($query);

   $stmt->execute([
    "id" => $id ]);

    $data_userall= $stmt->fetchAll(PDO::FETCH_OBJ);

   $query = null;
   $db=null;
   return $data_userall;
}



}







?>