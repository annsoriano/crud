<?php 
	require_once ('connect.php');


	try{
			$conn= db::getInstance();
			$query="SELECT * from userinfo";
			$sql=$conn->prepare($query);
			$sql->execute();
			$count=$sql->rowCOunt();

			while($row=$sql->fetch(PDO::FETCH_ASSOC)){
				$id=$row['id'];
				$username=$row['username'];
				$email=$row['email'];
				$firstname=$row['first_name'];
				$lastname=$row['last_name'];
				$gender=$row['gender'];
				$birthdate=$row['birthdate'];
			}

	}catch(Exception $e){
			echo "Error:".$e->getMessage();
	}
	
	$conn=null;

 ?>