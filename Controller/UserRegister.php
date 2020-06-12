<?php
require("../Data/UserData.php");
require_once("../Domain/User.php");
require_once("../Domain/UserRole.php");
require_once("../Domain/Company.php");
$userData= new UserData();
$user=new User();
$userRole=new UserRole();
$company=new Company();
$name=$_POST["name"];
$lastName=$_POST["lastName"];
$mail=$_POST["mail"];
$password=$_POST["password"];
$role=$_POST["rolType"];
$companyName=$_POST["company"];
$ocompanyAddress=$_POST["companyAddress"];

$password=password_hash($password,PASSWORD_DEFAULT);

$roleId=(explode(",",$role)[0]);
$roleName=(explode(",",$role)[1]);

$userRole->setRolName($roleName);
$userRole->setRoleId((int)$roleId);

$company->setCompanyName($companyName);
$company->setCompanyAddress($ocompanyAddress);
$company->setCompanyId(0);
$user->setUserId(0);

$user->setUserMail($mail);
$user->setUserPassword($password);
$user->setUserName($name);
$user->setUserLastName($lastName);
$user->setUserRol($userRole);
$user->setUserCompany($company);


$isValidRegistration=$userData->registerUser($user);
if($isValidRegistration!=-1){
    session_start();
    $_SESSION["user"]=$user;
    $role= $_SESSION["user"]->getUserRol();

    if( $role=='Company Owner'){
        header("location:/ClientServiceControl/View/CompanyOwnerView.php");

    }
    else if( $role='Company Admin'){
        header("location:/ClientServiceControl/View/CompanyAdminView.php");

    } else if( $role=='Admin'){
        header("location:/ClientServiceControl/View/AdminView.php");

    } 
    
}else{
    header("location:../index.php");

}


?>