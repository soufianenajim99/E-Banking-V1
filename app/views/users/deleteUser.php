<?php
require_once('../../models/user.php');
$user_id=$_GET["user_id"];
$user = new Users();
$user->deleteUser($user_id);
header("Location: ../../views/admin/users.php");

?>