<!DOCTYPE html>
<html>
<head>
	<title>Exercise 1</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	.error{
		color: red;
	}

</style>
<body>
<?php 
	require_once 'exerciseinsert.php';
 ?>
<div class="container">
	<h2>C-R-U-D</h2>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#create" data-toggle="tab">Create</a></li>
		<li><a href="#read" data-toggle="tab">Read</a></li>
		<li><a href="#update" data-toggle="tab">Update</a></li>
		<li><a href="#delete" data-toggle="tab">Delete</a></li>
	</ul>

	<div class="tab-content">
		<div id="create" class="tab-pane fade in active">
			<form action="exercise.php" method="POST" accept-charset="utf-8">
				<div class="form-group">
					Username:<br>
					<input type="text" name="username" class="emCheck form-control" required placeholder="Username">			
					<span class="error"><?= $userErr;?></span>
				</div>
				<div class="form-group">
					Password:<br>
					<input type="password" name="password" class="emCheck form-control" required placeholder="Password">
				</div>
				<div class="form-group">
					Email:<br>
					<input type="email" name="email" class="emCheck form-control" required placeholder="Email">
					<span class="error"><?php echo $emailErr; ?> </span>
				</div>
				<div class="form-group">
					Firstname:<br>
					<input type="text" name="firstname" class="emCheck form-control" required placeholder="Firstname">
					<span class="error"><?php echo $fNameErr;  ?></span>
				</div>
				<div class="form-group">
					Lastname: <br>
					<input type="text" name="lastname" class="emCheck form-control" required placeholder="Lastname">
					<span class="error"><?php echo $lNameErr;?></span>
				</div>
				<div class="form-group">
					Birthdate: <br>
					<input type="date" name="birthdate" class="emCheck form-control" required placeholder="01-Jan-1900">
					<span class="error"><?php echo $date;?></span>
				</div>
				<div class="checkbox">
					Gender: <br>
					<label><input type="radio" name="gender" id="check" value="female" >Female</label><br>
					<label><input type="radio" name="gender" id="check" value="male" >Male</label>
				</div>
				<div>
					<input type="submit" name="submit">
				</div>
			</form>
		</div>
		<div id="read" class="tab-pane fade">

			<h2>Read</h2>
			<?php  require_once 'read.php';?>
			<table class="table-striped table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Gender</th>
						<th>Birthdate</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if($count!=0){
							echo "<tr> 
								<td>$id</td>
								<td>$username</td>
								<td>$email</td>
								<td>$firstname</td>
								<td>$lastname</td>
								<td>$gender</td>
								<td>$birthdate</td>
							</tr>"; 
						}
					 ?>
				</tbody>
			</table>
		</div>
		<div id="update" class="tab-pane fade">
				<h1>Update</h1>
				<form action="update.php" method="post" accept-charset="utf-8">
					<div class="form-group">
						Username:
						<input type="text" class="form-control" name="username" placeholder="Username" required>
					</div>
					<div class="form-group">
						Password:
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
					<div class="form-group">
						Email:	
						<input type="email" class="form-control" name="email" placeholder="Email">	
						<span class="error"><?=$emailErr ?> </span>
					</div>			
					<div class="form-group">
						Firstname:
						<input type="text" class="form-control" name="firstname" placeholder="Firstname">
						<span class="error"><?=$fNameErr ?> </span>
					</div>						
					<div class="form-group">
						Lastname:
						<input type="text" class="form-control" name="lastname" placeholder="Lastname">
						<span class="error"><?=$lNameErr ?> </span>
					</div>	
					<div class="form-group">
						Birthdate: <br>
						<input type="date" name="birthdate" class=" form-control" required placeholder="01-Jan-1900">
						<span class="error"><?php echo $date;?></span>
					</div>
					<div class="checkbox">
						Gender: <br>
						<label><input type="radio" name="gender" id="check" value="female" >Female</label><br>
						<label><input type="radio" name="gender" id="check" value="male" >Male</label>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control" name="updatebutton" style="width:10%; margin: 0 auto ">Submit</button>
					</div>		
				</form>	
		</div>
		<div id="delete" class="tab-pane fade">
			<h1>Delete Account</h1>
			<?php require_once 'delete.php';  ?>
			<form action="" method="POST" accept-charset="utf-8">
				<div class="form-group">
					Username:
					<input type="text" name="username" class="form-control" placeholder="Username">
					<span class="error"><?=$userErr?></span>
				</div>			
				<div class="form-group">
					Password:
					<input type="text" name="password" class="form-control" placeholder="Password">
					<span class="error"><?=$passErr ?></span>
				</div>	
				<div class="form-group">
					<button type="submit">Delete</button>
					<span><?=$deleteErr ?></span>
				</div>		
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function required(){
		document.getElementById("check").required=true;
	}
</script>
</body>
</html>