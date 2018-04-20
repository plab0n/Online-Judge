<?php
	session_start();
		
		if(isset($_SESSION['user_login']) && $_SESSION['user_login']){
			header('location:http://localhost/pro/contest_log.php');
		}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" Content="IE-edge">
	<meta name="viewport" content="width=device-width">
	<title>Online Judge</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/mystyle.css" />
</head>
<body>
	
	<div class="container-fluid header">
		<div class="container">
			<div class="row">
			<div class="col-sm-6 title">			
				<h3>Code Mosh-Pit</h3>			
			</div>
			<div class="col-sm-6 sign_up">
				<a href="Sign_up.php" style="color: white;" class="btn btn-success"><h4>Sign Up</h4></a>
			</div>			
			</div>
		</div>
	</div>
	
		</br>
	
	<div class="container-fluid">
	<div class="row" >
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		<center><h2>Log In</h2></center>
		  <form method='post' action='log_in.php'>
			<div class="form-group">
			  <input type="text" class="form-control" id="handle" placeholder="Enter handle" name="handle" required="true"/>
			</div>
			<div class="form-group">
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="true"/>
			</div>
			<div class="from-group">
				<select type="select" class="form-control" id="type" name="type">
				  <option value="contestant">Contestant</option>
				  <option value="psetter">Problem Setter</option>
				</select>
			</div>
			</br>
			<div class="from-group">
			<input type="submit" class="btn btn-default" value="Login">
			</div>
		  </form>
		</div>
		<div class="col-sm-4"></div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row" >
		<div class="col-sm-6"></div>
		<div class="col-sm-6"></div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
