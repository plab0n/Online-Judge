<?php 

		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		
		$name = $_POST["name"];
		$date = $_POST["date"];
		$time = $_POST["time"];
		$duration = $_POST["cduration"];
		
		echo $name."<br>".$date."<br>".$time."<br>".$duration."<br>";
		
		$q = "INSERT INTO contest_log(c_name,c_time,c_date,c_duration) VALUES('$name','$time','$date','$duration')";
		
		$exec = mysqli_query($link,$q);
		
		if($exec)
		{
			header('location:http://localhost/pro/contest_ps.php');
			
		}
		else
			echo mysqli_error($link);



?>
