<?php

require_once("DataProvider.php");

class RoleOfUser extends DataProvider{
    private $id;
    private $userId;
    private $roleName;

    public function __construct($id,$userId,$roleName){
        $this->id = $id;
        $this->userId = $userId;
        $this->roleName = $roleName;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
       $this->id = $id;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
        $this->userId = $userId;
    }
    public function getRoleName(){
        return $this->roleName ;
    }
    public function setRoleName($roleName){
        $this->roleName = $roleName;
    }

    public function getAllRolesOfUsers(){
        $db = $this->connect();
        $fetchRoleOfUserDataQuery = "select * from roleofuser";
        $stmt = $db->prepare($fetchRoleOfUserDataQuery);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);  
        } 
        catch(PDOException $e){
            die("invalid select query" . $e->getMessage());
        }
    }

    public function addRoleOfUser(){
        $db = $this->connect();
        $addRoleOfUserQuery = "insert into roleofuser(userId,name) values(:userId,:name)";
        $stmt = $db->prepare($addRoleOfUserQuery);
        $stmt->bindParam(":userId" ,$this->userId , PDO::PARAM_INT );
        $stmt->bindParam(":name",$this->roleName, PDO::PARAM_STR);

        try{
            $stmt->execute();
        }
        catch(PDOException $e){
            die("invalid add query" . $e->getMessage());
        }
    }

    public function updateRoleOfUser($userId,$name){
        $db = $this->connect();
        $updateRoleOfUserQuery = "update roleofuser set userId = $userId , name = $name";
        $stmt = $db->prepare($updateRoleOfUserQuery);
        $stmt->bindParam(":userId" , $userId, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name , PDO::PARAM_STR);

        try{
            $stmt->execute();
        }
        catch(PDOException $e){
            die('invalid update query ' . $e->getMessage());
        }
    }


    public function deleteRoleOfUser($id){
        $db = $this->connect();
        $deleteRoleOfUserQuery = "delete from roleofuser where roleOfUserId = :id";
        $stmt = $db->prepare($deleteRoleOfUserQuery);
        $stmt->bindParam(":id" , $id , PDO::PARAM_INT);
        try{
            $stmt->execute();
        }
        catch(PDOException $e){
            die('invalid delete query' . $e->getMessage());
        }
    }
}

?>