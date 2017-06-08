<?php
require_once("Forte2.php");
 class BlogDataBase{
	 private $host = DB_HOST;
	 private $user = DB_USERNAME;
	 private $password = DB_PASSWORD;
	 private $db = DB;
	 public $connection = null;
	 
	 public function __construct(){
	 
	 	 if(!$this->connection)
		 $this->connection = new mysqli($this->host,$this->user,$this->password,$this->db);

		  $this->connection->set_charset("utf-8");
	}  
	public function deleteQuery($query){
	
			 $this->connection->query($query);
	}
	 	public function insertQuery($query , $array = array()){
  		
  				if(!empty($array)){

					$connection = DB_CONNECTION;
					$pdo = new PDO($connection,$this->user,$this->password);
					$stmt = $pdo->prepare($query);
					$stmt->execute(array_values($array));
					$pdo = null;
					$connection = null;
			 
				}else{
			 		$result = $this->connection->query($query);
					if(empty($result))
						throw new Exception("Nothing went into database");
				}
  			
  		}
		
  public function close(){
   	try{
	  	$this->connection->close();
	}catch(Exception $ex){
		echo($ex->getMessage());
	}
  }
  public function selectQuery($query , $array = array()){
    try {
        if (!empty($array)) {

            $connection = DB_CONNECTION;
            $pdo = new PDO($connection, $this->user, $this->password);
            $stmt = $pdo->prepare($query);

            $stmt->execute(array_values($array));
            $array = $stmt->fetch(PDO::FETCH_BOTH);


            $result = $array;

            $pdo = null;
            $connection = null;
            return $result;
        } else {
            $result = $this->connection->query($query);

            return $result;
        }
    }catch(Exception $ex){
        print_r($ex);
    }
  }
  public function updateQuery($query , $array = array()){
  	
  			if(!empty($array)){
				
				$connection = DB_CONNECTION;
				$pdo = new PDO($connection,$this->user,$this->password);
				$stmt = $pdo->prepare($query);
				$stmt->execute(array_values($array));
				$pdo = null;
				$connection = null;
			}else{
				$result = $this->connection->query($query);
				
					
			}
  		
  }
  //end of class/////////////////////////////////////////////////
 }
?>