<?php

session_start();
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		
	
		$sin = $_POST["sa_in"];
		$sout = $_POST["sa_out"];
		$ad_in = $_POST["adtn_in"];
		$ad_out = $_POST["adtn_out"];
		$pid=$_SESSION['pid'];
		
		$q = "INSERT INTO test_case(p_id,sample_input,sample_output,addi_input,addi_output) VALUES('$pid','$sin','$sout','$ad_in','$ad_out')";
		
		$exec_Q = mysqli_query($link,$q);
		if(!$exec_Q)
			echo mysqli_error($link);
		else
		{
			header('location: http://localhost/pro/ps_dash.php');
		}
?>
