<?php 
class UserRole{
    private $roleId;
    private $rolName;


public function setRoleId($roleId){
    $this->roleId = $roleId;
   }

public function getRolId(){
    return $this->roleId;
   }
   public function setRolName($rolName){
    $this->rolName = $rolName;
   }

public function getRolName(){
    return $this->rolName;
   }

}


?>