<?php
session_start();
session_destroy();
header("location:/ClientServiceControl/index.php");

?>