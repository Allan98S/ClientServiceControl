<?php
class Connection{
    protected $conection_db;
	
	public function Connection(){

		
		try{
			//$this->conection_db=new PDO('mysql:host=localhost; dbname=id13092707_expertos_bd','id13092707_root',
			//'123456789Allan!');
			$this->conection_db=new PDO('mysql:host=localhost; dbname=client_services_control','root','');
		//	$this->conexion_db=new PDO('mysql:host=163.178.107.10; dbname=expertos_b66946','laboratorios','UCRSA.118');
			$this->conection_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conection_db->exec("SET CHARACTER SET utf8");
			return $this->conection_db;
			
		}catch(Exception $e){
			echo "Error line: ". $e->getLine();
		}
	}  
}


?>