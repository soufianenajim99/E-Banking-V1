<?php
require_once('../../models/agency.php');
$agency_id=$_GET["agency_id"];
$agency = new Agency();
$agency->deleteAgence($agency_id);
header("Location: ../../views/admin/agency.php");

?>