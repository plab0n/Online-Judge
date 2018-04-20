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
	<?php
	session_start();
	
	
	
	
	
	?>
	
	
	
	

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
					  <li><a href="#">Create Contest</a></li>
					  <li><a href="#">Add Problem</a></li>
					  <li><a href="#">Clarification</a></li>
					  <li><a href="#">Ranklist</a></li>
					  <li><a href="#">Announcement</a></li>
				</ul>
				</div>
			  </div>
			<div class="col-sm-9">
			<form method='post' action='tcase_in.php'>
				
				<div class="form-group">
				  <label for="text">Sample Input</label>
				  <textarea type="text" class="form-control" id="sa_in" placeholder="Input" name="sa_in" required="true"></textarea>
				</div>
				<div class="form-group">
				  <label for="text">Sample Output</label>
				  <textarea type="text" class="form-control" id="sa_out" placeholder="Output" name="sa_out" required="true"></textarea>
				</div>
				<br />
				<div class="form-group">
				  <label for="text">Additional Input</label>
				   <textarea type="text" class="form-control" id="adtn_in" placeholder="Input" name="adtn_in"></textarea>
				</div>
				<div class="form-group">
				  <label for="text">Additional Output</label>
				  <textarea type="text" class="form-control" id="adtn_out" placeholder="Output" name="adtn_out" required="true"></textarea>
				</div>
				
				<br />				
				<div class="from-group">
					<input type="submit" class="btn btn-default" value="Submit"/>
				</div>
			</form>
			<br />
			</div>
			
		</div>
	</div>
	
	
	

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
