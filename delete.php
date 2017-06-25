<?php 
require 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

		//username
			if(!empty(strlen($_POST['username'])<3 || strlen($_POST['username'])>12 )){
				$userErr="Invalid username. Minimum length of username is 3 and maximum is 12";
			}	
			else{
				$username=test2($_POST['username']);	
			}
			
		//password
			$password=sha1(test2($_POST['password']));

	try{
		$conn=db::getInstance();
		$sql=$conn->prepare("DELETE FROM userinfo WHERE username='$username' and pass='$password'");
		$sql->execute();


	}catch(Exception $e){
		echo "Error".$e->getMessage();
	}

}	

$conn=null;

 ?>