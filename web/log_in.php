<?php
		session_start();
		
		if($_SESSION['user_login']){
			header('location:http://localhost/pro/contest_log.php');
		}
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		$handle = $_POST['handle'];
		$pwd = $_POST['pwd'];
		$type = $_POST['type'];
		echo $handle."<br>";
		echo $pwd."<br>";
		$sql = "SELECT * FROM user_log WHERE u_handle = '$handle' and u_type = '$type' and u_pass='$pwd'";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
		$cnt = mysqli_num_rows($result);
		echo $cnt."<br>";
		if($cnt==1)
			{
				$_SESSION['userhandle'] = $handle;
				$_SESSION['user_name'] = $row['u_handle'];
				$_SESSION['user_id'] = $row['u_id'];
				$_SESSION['user_login'] = true;
				
				//echo $_SESSION['userhandle'];
				if($type=="contestant")
				header('location:http://localhost/pro/contest.php');
				else
					header('location:http://localhost/pro/ps_dash.php');
				//
			}
		else
			{
				header('location: http://localhost/pro/index.php');
				//echo "INVALID USERNAME OR PASSWORD";
			}
			$link.close();
?>
