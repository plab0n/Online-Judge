<?php
session_start();
		$host = 'localhost:3306';  
		$user = 'root';  
		$pass = 'abc';  
		$db = 'OJ_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		$pname = $_POST['name'];
		$tl = $_POST['tle'];
		$ml = $_POST['mle'];
		$desc = $_POST['p_desc'];
		$sin = $_POST['p_in'];
		$sout = $_POST['p_out'];
		$cid = $_POST['cid'];
		echo $pname."<br>".$tl."<br>".$ml."<br>".$desc."<br>".$sin."<br>".$sout."<br>";
		$q = "INSERT INTO problem_table(c_id,p_name,tle,mle,p_desc,p_in,p_out) VALUES('$cid','$pname','$tl','$ml','$desc','$sin','$sout')";
		$stt = mysqli_query($link,$q);
		if($stt){
    $last_id = mysqli_insert_id($link);
   $_SESSION['pid']=$last_id;
    
			//$_GET['pname'] = $pname;
			
			header('location: http://localhost/pro/tcase.php');
} else {
    echo "Error: " . $q . "<br>" . mysqli_error($link);
}
		
		
		
		
?>
