

<?php
		
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if(!($_SESSION['user_login'])){
			header('location:http://localhost/pro/index.php');
		}


		if(isset($_GET['p_id']) && isset($_GET['c_id']) && $_SESSION['user_id']){
			$p_id = $_GET['p_id'];
			$c_id = $_GET['c_id'];
			$u_id = $_SESSION['user_id'];
 		}
		else if(isset($_GET['p_id'])){
			$p_id = $_GET['p_id'];
		}
		
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
			

		$sql = "SELECT * FROM problem_table INNER JOIN test_case ON problem_table.p_id=test_case.p_id WHERE problem_table.p_id = '$p_id'";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

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
		  <li class="active"><a href="contest_log.php">Home</a></li>
		  <li><a href="contest.php">Contest Log</a></li>
		</ul>
	  </div>
	</nav>

	<div class="container">

		<div class="row">
			<div class="col-sm-2">
				<div class="row">
					<ul class="nav nav-pills nav-stacked">
					  <li><a href="ps_dash.php">Dashboard</a></li>
					  <li><a href="create_contest.php">Create Contest</a></li>
					  <li><a href="problem.php">Add Problem</a></li>
					  <li><a href="#">Clarification</a></li>
					  <li><a href="#">Ranklist</a></li>
					  <li><a href="#">Announcement</a></li>
					</ul>
				</div>
			  </div>
			<div class="col-sm-7">
				<div class="row p_name">
					<label for="text">Problem Name :  </label><label><?php echo $row['p_name']; ?></label><br />
					<label for="text">Time Limit:  </label><label><?php echo $row['tle']; ?></label><br />
					<label for="text">Memory Limit:  </label><label><?php echo $row['mle']; ?></label>
				</div><br />
				<div class="row">
					<label for="text">Description</label><br />
					<label><?php echo $row['p_desc']; ?></label>
				</div><br />
				<div class="row">
					<label for="text">Input Formet</label><br />
					<label><?php echo $row['p_in']; ?></label>
				</div><br />
				<div class="row">
					<label for="text">Output Formet</label> <br />
					<label><?php echo $row['p_out']; ?></label>
				</div><br />
				<div class="row">
					<label for="text">Sample Input:</label><br />
					<label><?php echo $row['sample_input']; ?></label>
				</div><br />
				<div class="row">
					<label for="text">Sample Input:</label><br />
					<label><?php echo $row['sample_output']; ?></label>
				</div>
				<br /><br /><br />
			</div>
			<br /><br /><br />
			<div class="col-sm-3"></div>
			
		</div>
	</div>
	
	
	

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

