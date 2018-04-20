<?php
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		
		$name = $_POST['name'];
		$handle = $_POST['handle'];
		$pwd = $_POST['password'];
		$tp = $_POST['type'];
		$inQ = "INSERT INTO user_log(u_name,u_handle,u_pass,u_type) VALUES('$name','$handle','$pwd','$tp')";
		
		$exec_Q = mysqli_query($link,$inQ);
		if(!$exec_Q)
			echo "OOppss!!! Something went wrong in insertion. Please try again....";
		else
		{
			header('location: http://localhost/pro/index.php');
		}
		$link.close();

?>
