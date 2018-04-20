

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
			if(!$exec_Q)
				echo '<script> alert('.$exec_Q.');</script>';
	
			else
			{
				echo '<script> alert("Submitted");</script>';
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
				<h5>Handle</h5>
			</div>			
			</div>
		</div>
	</div>
	
	
	<nav class="navbar navbar-default">
	  <div class="container">
		<ul class="nav navbar-nav">
		  <li class="active"><a href="contest_log.php">Home</a></li>
		  <li><a href="contest.php">Contest Log</a></li>
		  <!-- <li><a href="#">Page 2</a></li>
		  <li><a href="#">Page 3</a></li> -->
		</ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row">			
			<h3>Clarification</h3>			
		</div>

		<div class="row">
			<div class="col-sm-2">
				<div class="row">
					<ul class="nav nav-pills nav-stacked">
					  <li class="active"><a href="#">Clarification</a></li>
					  <li><a href="#">Ranklist</a></li>
					  <li><a href="#">Submission</a></li>
					  <li><a href="#">Announcement</a></li>
					</ul>
				</div>
			  </div>
			<div class="col-sm-7">
				<p>Show Messsage</p>
				
			</div>
			<div class="col-sm-3">
				<div class="row">
						<div class="form-group">
							<label for="text">Send Messsage</label>
							<textarea type="text" class="form-control" id="send_message" placeholder="Send Messsage" name="send_message" required="true"></textarea>
						</div>
						<div class="from-group">
							<input type="submit" class="btn btn-default" name="btn" value="Send"/>
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
