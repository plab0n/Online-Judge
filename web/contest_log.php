<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
		
		if(!($_SESSION['user_login'])){
			header('location:http://localhost/pro/index.php');
		}
		
		if(isset($_GET['logout'])){
			unset($_SESSION['user_login']);
			unset($_SESSION['userhandle']);
			unset($_SESSION['user_name']);
			header('location:http://localhost/pro/index.php');
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
			<div class="col-md-6 col-sm-6 col-xs-12 title">			
				<h3>Code Mosh-Pit</h3>			
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 sign_up">
				<?php
					
					echo '<p style="color:#fff;">'.$_SESSION['user_name'].'</p>';
			?>
			<a href= "contest_log.php?logout=logout" ><input type="submit" name="logout" class="btn btn-success" value="LogOut" ></a>
			</div>			
			</div>
		</div>
	</div>
	

	<nav class="navbar navbar-default">
	  <div class="container">
		<ul class="nav navbar-nav">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="contest_log.php">Contest Log</a></li>
		  <!-- <li><a href="#">Page 2</a></li>
		  <li><a href="#">Page 3</a></li> -->
		</ul>
	  </div>
	</nav>
	
	<div class="container-fluid">
		<div class="row" >
		<div class="col-md-6 col-sm-6 col-xs-12"></div>
		<div class="col-md-6 col-sm-6 col-xs-12"></div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	
</body>
</html>
