<?php
require_once("class.blogdatabase.php");
require_once("CustomSessionHandler.php");
$password = null;
$username = null;

if($_SERVER["REQUEST_METHOD"] == "POST"){
try{
	$username               = htmlentities($_POST['username']);
	$password            = sha1(htmlentities($_POST['password']));
	$mysql_connection    = new BlogDataBase();
	$params = array($username,$password);
	if(empty($username) || empty($password))
		throw new Exception("Invalid username or password");

	$params = $mysql_connection->selectQuery("select * from zero where username = ? and password = ?",$params);
  //  $params = $mysql_connection->selectQuery("select * from blog where username = ? and password = ?",$params);

	 if(!empty($params)){
	 		
		 if($params["username"] == $username && $password == $password){


			 $mysql_connection->close();
			 session_name("zero");
			session_start();
            $_SESSION["loggedin"] = true;
            header("Location:zero.php");
            exit;
		}else{
			throw new Exception("Invalid email or password");
		}
	}else{
		$params = array($username,$password);
		$params = $mysql_connection->selectQuery(("select * from zero where username = ? and password = ?"),$params);
        //$params = $mysql_connection->selectQuery(("select * from blog where username = ? and password = ?"),$params);
		if(empty($params))
			throw new Exception("Invalid email or password");
        else{
            session_name("zero");
            session_start();
            $_SESSION["loggedin"] = true;
            header("Location:zero.php");
            exit;
        }

	}
	

	}catch(Exception $ex){

	exit;
	}

}else{
    header("Location:index.php");
exit;
}
?>