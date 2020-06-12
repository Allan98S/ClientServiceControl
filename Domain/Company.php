<?php
class Company{
 private $companyId;
 private $companyName;
 private $companyAddress;
 
 public function setCompanyId($companyId){
    $this->companyId = $companyId;
   }

public function getCompanyId(){
    return $this->companyId;
   }

public function getCompanyName(){
   return $this->companyName;
}

public function setCompanyName($companyName){
   $this->companyName = $companyName;
}
public function setCompanyAddress($companyAddress){
    $this->companyAddress = $companyAddress;
   }

public function getCopanyAddress(){
    return $this->companyAddress;
   }

}

?>