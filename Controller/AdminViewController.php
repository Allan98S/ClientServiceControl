<?php
require_once("../Data/ServiceData.php");
$serviceData=new ServiceData();
$serviceList=$serviceData->getAllServices();

require_once("../View/AdminView.php");



?>