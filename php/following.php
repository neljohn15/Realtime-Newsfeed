<?php

session_start();
foreach ($_SESSION['user'] as $key) {
	$name=$key["username"];
}
include  'component.php';
include '../connection/connection.php';
?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><?php
		
		$all="SELECT * FROM user_following where user_following_name='$name' and user_following_following!='$name'";
		$all_sql=mysqli_query($con,$all);
	
		
		while ($acc_row=mysqli_fetch_assoc($all_sql)) {
			
			
				following($acc_row['user_following_following']);

			}
?>