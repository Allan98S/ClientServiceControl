<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../Data/UserData.php");
$userData=new UserData();
echo(json_encode($userData->getUserRoles()));


?>