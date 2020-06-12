<?php
 class Service{
    private $serviceId;
    private $expireDate;
    private $serviceType;
    private $serviceDescription;

    public function setServiceID($serviceId){
        $this->serviceId = $serviceId;
       }
    
    public function getServiceId(){
        return $this->serviceId;
       }

       public function setServiceDescription($serviceDescription){
        $this->serviceDescription = $serviceDescription;
       }
    
    public function getServiceDescription(){
        return $this->serviceDescription;
       }

       public function setServiceType($serviceType){
        $this->serviceType = $serviceType;
       }
    
    public function getServiceType(){
        return $this->serviceType;
       }

       
    public function setExpireDate($expireDate){
        $this->expireDate = $expireDate;
       }
    
    public function getExpireDate(){
        return $this->expireDate;
       }
    


}

?>