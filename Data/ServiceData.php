<?php
require("../Config/Connection.php");
class ServiceData extends Connection{
    public function ServiceData(){
       
       parent::__construct(); 
    }

function getAllServices(){
    $sql="Select s.service_id,s.expire_date,s.service_type_id,s.description, st.service_type_id,st.type_of_service
     from service s, service_type st where s.service_type_id=st.service_type_id";
    $statement=$this->conection_db->prepare($sql);
    $statement->execute(array());
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
    $this->conection_db=null;
}
function getServicesOfUser($userId){

   $sql="Select s.service_id,s.expire_date,s.service_type_id,s.description, st.service_type_id,st.type_of_service,c.company_name
    from service s, service_type st,user_service us,user u,company c where s.service_type_id=st.service_type_id and
     s.service_id=us.service_id and us.user_id=u.user_id AND c.company_id=u.company_id AND u.user_id= ".$userId.";";
   $statement=$this->conection_db->prepare($sql);
   $statement->execute(array());
   $result=$statement->fetchAll(PDO::FETCH_ASSOC);
   $statement->closeCursor();
   return $result;
   $this->conection_db=null;

}

}

?>