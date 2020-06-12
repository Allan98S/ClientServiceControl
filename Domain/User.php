<?php
 class User{
    private $userId;
    private $userMail;
    private $userPassword;
    private $userName;
    private $userLastName;
    private $userRol;
    private $userCompany;
    private $servicesList;

    public function setUserCompany($userCompany){
        $this->userCompany = $userCompany;
       }
    
    public function getUserCompany(){
        return $this->userCompany;
       }

    public function setServicesList($servicesList){
        $this->servicesList = $servicesList;
       }
    
    public function getServicesList(){
        return $this->servicesList;
       }
       public function setUserRol($userRol){
        $this->userRol = $userRol;
       }
    
    public function getUserRol(){
        return $this->userRol;
       }


    public function setUserId($userId){
        $this->userId = $userId;
       }
    
    public function getUserId(){
        return $this->userId;
       }
       public function setUserMail($userMail){
        $this->userMail = $userMail;
       }
    
    public function getUserMail(){
        return $this->userMail;
       }
       public function setUserPassword($userPassword){
        $this->userPassword = $userPassword;
       }
    
    public function getUserPassword(){
        return $this->userPassword;
       }
       public function setUserName($userName){
        $this->userName = $userName;
       }
    
    public function getUserName(){
        return $this->userName;
       }
       public function setUserLastName($userLastName){
        $this->userLastName = $userLastName;
       }
    
    public function getUserLastName(){
        return $this->userLastName;
       }

}


?>