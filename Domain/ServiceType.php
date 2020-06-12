<?php
class ServiceType{
    private $serviceTypeId;
    private $serviceTypeDescription;

    public function setServiceTypeId($serviceTypeId){
        $this->serviceTypeId = $serviceTypeId;
       }
    
    public function getServiceTypeId(){
        return $this->serviceTypeId;
       }
       public function setServiceTypeDescription($serviceTypeDescription){
        $this->serviceTypeDescription = $serviceTypeDescription;
       }
    
    public function getServiceTypeDescription(){
        return $this->serviceTypeDescription;
       }
}


?>