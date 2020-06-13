<?php
require("../Config/Connection.php");
require("../Domain/User.php");
require("../Domain/Company.php");
require("../Domain/UserRole.php");
require("../Domain/Service.php");
require("../Domain/ServiceType.php");
class UserData extends Connection{
 public function UserData(){
    
	parent::__construct(); 
 }
function getUserRoles(){
    $sql="Select * from user_role where rol_id<3;";
    $statement=$this->conection_db->prepare($sql);
    $statement->execute(array());
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
    $this->conection_db=null;
}
function verifyLogin($mail,$password){
    $sql="Select u.user_id,u.user_mail,u.user_name,u.user_last_name,u.user_password,u.rol_id,
    r.rol_name,c.company_id,c.company_name,c.company_address  from user u ,user_role r,company c
     where u.user_mail='".$mail."' AND  u.rol_id=r.rol_id and  c.company_id=u.company_id ;";
    
    $statement=$this->conection_db->prepare($sql);
    $statement->execute(array());
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    // check if hatch passsword  es equal to password inserted by the user
    foreach($result as $row){
        if(password_verify($password,$row['user_password'])){
        $user=new User();
        $company=new Company();
        $role=new UserRole();
        $company->setCompanyId($row['company_id']);
        $company->setCompanyName($row['company_name']);
        $company->setCompanyAddress($row['company_address']);
        $user->setUserCompany($company);
        $role->setRoleId($row['rol_id']);
        $role->setRolName($row['rol_name']);
        $user->setUserRol($role);
        $user->setUserId($row['user_id']);
        $user->setUserMail($row['user_mail']);
        $user->setUserPassword($row['user_password']);
        $user->setUserName($row['user_name']);
        $user->setUserLastName($row['user_last_name']);
        $user->setServicesList($this->getServicesOfUser($row['user_id']));
        session_start();
        $_SESSION["user"]=$user; 

        return true;
        }
    }
    return false;
}
function getServicesOfUser($idUser){
    $service=new Service();
    $serviceType=new ServiceType();
    $services=array();
    $sql="SELECT s.service_id,s.expire_date,s.description,st.service_type_id,st.type_of_service
     from service s , user_service us, user u, service_type st where  s.service_id=us.service_id 
     and u.user_id= us.user_id and st.service_type_id=s.service_type_id and u.user_id=".$idUser.";";
    
    $statement=$this->conection_db->prepare($sql);
    $statement->execute(array());
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    foreach($result as $row){
        $service->setServiceID($row["service_id"]);
        $service->setServiceDescription($row["description"]);
        $service->setExpireDate($row["expire_date"]);
        $serviceType->setServiceTypeId($row["service_type_id"]);
        $serviceType->setServiceTypeDescription($row["type_of_service"]);
        $service->setServiceType($serviceType);
        array_push($services,$service);
    }
    $this->conection_db=null;
    return $services;

}
function registerUser($user){
     //First insert the company of the user and then insert the user, because of foreign key reference
    $query1 = 'Insert into  company   SET company_name = :company_name, 
    company_address = :company_address ';
    $stmt = $this->conection_db->prepare($query1);
    $company= $user->getUserCompany();
    $companyAddress=$company->getCopanyAddress();
    $companyName=$company->getCompanyName();
    $stmt->bindParam(':company_name', $companyName);
    $stmt->bindParam(':company_address', $companyAddress);
    $companyId=-1;
    if($stmt->execute()){
        $sql="SELECT LAST_INSERT_ID() as 'index';";
        $statement=$this->conection_db->prepare($sql);
        $statement->execute(array());
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        foreach($result as $tupla ){
        $companyId=$tupla['index'];
        }
    }else{
        printf("Error: %s.\n", $stmt->error);
        }
    $query2 = 'Insert into  user   SET user_mail = :user_mail, user_password = :user_password, 
    user_name = :user_name, user_last_name =:user_last_name,rol_id =:rol_id,company_id =:company_id';
          $stmt = $this->conection_db->prepare($query2);
          $mail=$user->getUserMail();
          $password=$user->getUserPassword();
          $name=$user->getUserName();
          $mail=$user->getUserMail();
          $lastName=$user->getUserLastName();
          $rol=$user->getUserRol();
          $roleId=$rol->getRolId();
          $company=$user->getUserCompany();
          $stmt->bindParam(':user_mail', $mail);
          $stmt->bindParam(':user_password',  $password);
          $stmt->bindParam(':user_name', $name);
          $stmt->bindParam(':user_last_name', $lastName);
          $stmt->bindParam(':rol_id', $roleId);
          $stmt->bindParam(':company_id', $companyId);
          $idUser=-1;
          if($stmt->execute()) {
            $sql="SELECT LAST_INSERT_ID() as 'index';";
            $statement=$this->conection_db->prepare($sql);
            $statement->execute(array());
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            foreach($result as $tupla ){
            $idUser=$tupla['index'];
            }
            $this->conection_db=null;
            return $idUser;
      }else{
      printf("Error: %s.\n", $stmt->error);
      }

      return $idUser;
 }
}

?>