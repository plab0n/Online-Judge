<?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		
		if(isset($_GET['c_id'])){
			$c_id = $_GET['c_id'];
			$_SESSION['cid'] = $_GET['c_id'];
 		}
		else
		$c_id=$_SESSION['cid'];
		/*if($_SESSION['user_login']){
			header('location:http://localhost/pro/contest_log.php');
		}*/
		
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";

		$sql = "SELECT * FROM problem_table WHERE c_id ='$c_id' order by p_id DESC";
		//SELECT * FROM problem_table INNER JOIN contest_log ON problem_table.p_id=contest_log.p_id WHERE contest_log.c_id = '$contest_id';
		$result = mysqli_query($link,$sql);
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
		  <li class="active"><a href="contest.php">Home</a></li>
		  <li><a href="contest_ps.php">Contest Log</a></li>
		</ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row">			
			<h3>Dashboard</h3>			
		</div>
		<div class="row">
			<div class="col-sm-3">
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
			<div class="col-sm-9">
				<ul>
					<?php 
					if($result){
						$i=1;
						while($row = $result->fetch_array(MYSQLI_ASSOC)){ 
							
						?>
							
						<a href="p_submit.php?p_id=<?php echo $row['p_id']; ?>&c_id=<?php echo $c_id;?>"><li><?php echo $row['p_name'];?></li></a>
							

					<?php $i++; }} ?>
				
				</ul>
			</div>
		</div>
	</div>
	
	
	

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<?php  ?>
