

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
		
		
		
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
							
			
		if(isset($_POST['btn'])){
			$type = $_POST['type'];
			$s_code = $_POST['s_code'];
			
			$sql = "INSERT INTO submission(s_code,lang,c_id,p_id,u_id) VALUES('$s_code','$type','$c_id','$p_id','$u_id')";
			
			$exec_Q = mysqli_query($link, $sql);
			if(!$exec_Q){
				echo '<script> alert('.$exec_Q.');</script>';
				
			}
	
			else
			{
				echo '<script> alert("Submitted");</script>';
				header('location:submission.php');
			}
			
		}



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
					  <li><a href="dashboard.php">Dashboard</a></li>
					  <li><a href="#">Clarification</a></li>
					  <li><a href="#">Ranklist</a></li>
					  <li><a href="submission.php">Submission</a></li>
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
			</div>
			<div class="col-sm-3">
				<div class="row">
					<label for="text">Time: 
					
					</label>
				</div>
				<br />
				<br />
				<div class="row">
					
					
					<form  method= "post" action="">
						<div class="from-group">
							<label for="text">Language</label>
							<select type="select" class="form-control" id="type" name="type">
							  <option value="c">C</option>
							  <option value="cpp">C++</option>
							  <option value="jave">Jave</option>
							</select>
						</div>
						<div class="form-group">
							<label for="text">Source Code</label>
							<textarea type="text" class="form-control" id="s_code" placeholder="Source Code" name="s_code" required="true"></textarea>
						</div>
						<div class="from-group">
							<input type="submit" class="btn btn-default" name="btn" value="Submit"/>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	
	
	

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
