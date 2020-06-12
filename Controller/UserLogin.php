<?php
require_once("../Data/UserData.php");
$userData= new UserData();
$mail=htmlentities(addslashes($_POST["mail"]));
$password=htmlentities(addslashes($_POST["password"]));

$isValidLogin=$userData->verifyLogin($mail,$password);
if($isValidLogin){
    session_start();
    $role=$_SESSION["user"]->getUserRol();
    if( $role->getRolName()=='Company Owner'){
        header("location:/ClientServiceControl/View/CompanyOwnerView.php");

    }
    else if( $role->getRolName()=='Company Admin'){
        header("location:/ClientServiceControl/View/CompanyAdminView.php");

    } else if( $role->getRolName()=='Admin'){
        header("location:/ClientServiceControl/View/AdminView.php");

    }
}else{
    header("location:../index.php");
}


?>