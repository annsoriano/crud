 <?php
require_once 'connect.php';
$userErr= $emailErr = $fNameErr = $lNameErr = $date="";

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
		//email
			if (!empty(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))) {
				$emailErr="Invalid email.";
			}
			else{
				$email=test2($_POST['email']);	
			}
		//firstname
			if(!empty(!preg_match("^[a-zA-Z ]^", $_POST['firstname']))){
				$fNameErr="Letters only";
			}
			else{
				$firstname=test2($_POST['firstname']);	
			}
		//lastname
			if(!empty(!preg_match("^[a-zA-Z ]^", $_POST['lastname']))){
				$lNameErr="Letters only";
			}
			else{
				$lastname=test2($_POST['lastname']);	
			}

			if (!empty(test2($_POST['gender']))) {
				$gender=test2($_POST['gender']);
			}	
		//year
			if (date("Y")>1900) {					
				$birthdate=test2($_POST['birthdate']);
			}
			else{
				$date="Invalid Year";
			}

		try{
		$conn=db::getInstance();
		$sql=$conn->prepare("UPDATE userinfo
			 set 
			 email='$email',
			 first_name='$firstname',
			 last_name='$lastname',
			 gender='$gender',
			 birthdate='$birthdate'
			   WHERE username='$username' and pass='$password' 
			 ");
		$sql->execute();

	}catch(Exception $e){
		echo "Error". $e->getMessage();
	}


}

header('location:exercise.php');
$conn=null;
function test2($data){
	$data=stripcslashes($data);
	$data=trim($data);
	$data=htmlspecialchars($data);
	return $data;
}	

	


?>