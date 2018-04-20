<?php if (session_status() == PHP_SESSION_NONE) {
			session_start();
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
		  <li class="active"><a href="contest_log.html">Home</a></li>
		  <li><a href="contest_log.html">Contest Log</a></li>
		</ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row">			
			<h3>Problem Setting</h3>			
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="row">
				<ul class="nav nav-pills nav-stacked">
					  <li><a href="ps_dash.php">Dashboard</a></li>
					  <li class="active"><a href="#">Create Contest</a></li>
					  <li><a href="problem.php">Add Problem</a></li>
					  <li><a href="#">Clarification</a></li>
					  <li><a href="#">Ranklist</a></li>
					  <li><a href="#">Announcement</a></li>
				</ul>
				</div>
			  </div>
			<div class="col-sm-6">
				<form method='post' action='cContest.php'>
					<div class="form-group">
						<label for="text">Contest Name</label>
						<input type="text" class="form-control" id="p_name" placeholder="Contest Name" name="name" required="true"/>
					</div> <br />						
					<div type="from-group">
						<label for="text"> Contest Date </label> <br />
						<input type="date" id="date" name="date"/>
					</div> <br />
					<div type="from-group">
						<label for="text">Contest time </label> <br />
						<input type="time" id="time" name="time"/>
					</div> <br />
					<div type="from-group">
						<label for="text">Contest Duration (In minute) </label> <br />
						<input type="text" id="cduration" name="cduration"/>
					</div> <br />
					<div class="from-group">
						<input type="submit" class="btn btn-info" value="Create Contest"/>
					</div>
				</form>
			</div>
			<div class="col-sm-3"></div>
				
		</div>
	</div>
	
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	
</body>
</html>
