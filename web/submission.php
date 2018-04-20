<?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	
		if(isset($_GET['c_id'])){
			$c_id = $_GET['c_id'];
 		}
		
		/*if($_SESSION['user_login']){
			header('location:http://localhost/pro/contest_log.php');
		}*/
		$u_id = $_SESSION['user_id'];
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		
		$sql = "SELECT * FROM modify_submission WHERE u_id='$u_id'";
		//SELECT * FROM problem_table INNER JOIN contest_log ON problem_table.p_id=contest_log.p_id WHERE contest_log.c_id = '$contest_id';
		$result = mysqli_query($link,$sql);
		
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
		  <li class="active"><a href="contest.php">Home</a></li>
		  <li><a href="contest.php">Contest Log</a></li>
		</ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row">			
			<h3>Submission</h3>			
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="row">
				<ul class="nav nav-pills nav-stacked">
				  <li><a href="dashboard.php">Dashboard</a></li>
				  <li><a href="#">Clarification</a></li>
				  <li><a href="#">Ranklist</a></li>
				  <li class="active"><a href="#">Submission</a></li>
				  <li><a href="#">Announcement</a></li>
				</ul>
				</div>
			  </div>
			<div class="col-sm-9">
				
				<table class="table">
					<thead>
					<tr>
						<th width="200px">Submission ID</th>
						<th width="200px">Language</th>
						<th width="200px">VERDICT</th>
						<th width="200px">Problem ID</th>
						
					</tr>
					</thead>
						<?php 
					if($result){
						$i=1;
						while($row = $result->fetch_array(MYSQLI_ASSOC)){ 
							
						?>
						<tbody>
						<tr>
						<td width="200px"><?php echo $row['s_id']; ?></td> 
						<td width="200px"><?php echo $row['lang'];?></td>
						<td width="200px"><?php echo $row['verdict'];?></td>
						<td width="200px"><?php echo $row['p_id'];?></td>
						
						</tr>
						</tbody>
						
					<?php $i++;}} ?>
					
				</table>
			</div>
		</div>
	</div>
	
	
	

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<?php  ?>
