<?php 
require_once 'connect.php';

$userErr= $emailErr = $fNameErr = $lNameErr = $date="";
	if($_SERVER["REQUEST_METHOD"]=="POST"){

		//username
			if(!empty(strlen($_POST['username'])<3 || strlen($_POST['username'])>12 )){
				$userErr="Invalid username. Minimum length of username is 3 and maximum is 12";
			}	
			else{
				$username=test($_POST['username']);	
			}
			
		//password
		$password=sha1(test($_POST['password']));
		//email
			if (!empty(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))) {
				$emailErr="Invalid email.";
			}
			else{
				$email=test($_POST['email']);	
			}
		//firstname
			if(!empty(!preg_match("^[a-zA-Z ]^", $_POST['firstname']))){
				$fNameErr="Letters only";
			}
			else{
				$firstname=test($_POST['firstname']);	
			}
		//lastname
			if(!empty(!preg_match("^[a-zA-Z ]^", $_POST['lastname']))){
				$lNameErr="Letters only";
			}
			else{
				$lastname=test($_POST['lastname']);	
			}

			if (!empty(test($_POST['gender']))) {
				$gender=test($_POST['gender']);
			}	
		//year
			if (date("Y")>1900 && date("Y")<date("Y")) {					
				$birthdate=test($_POST['birthdate']);
			}
			else{
				$date="Invalid Year";
			}

			try{
				
				$conn= db::getInstance();
				$sql=$conn->prepare("INSERT INTO userinfo (username, pass, email, first_name, last_name, gender, birthdate) VALUES (	:username, :password, :email, :firstname, :lastname, :gender, :birthdate)");
				$sql->bindParam(':username',$username);
				$sql->bindParam(':password',$password);
				$sql->bindParam(':email',$email);
				$sql->bindParam(':firstname',$firstname);
				$sql->bindParam(':lastname',$lastname);
				$sql->bindParam(':gender',$gender);
				$sql->bindParam(':birthdate',$birthdate);
				$sql->execute();
			}catch(PDOException $e){
				echo "Error".$e->getMessage();
			}

	}



	$conn=null;

function test($data){
	$data=stripcslashes($data);
	$data=trim($data);
	$data=htmlspecialchars($data);
	return $data;
}	

	
?>