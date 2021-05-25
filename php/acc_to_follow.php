<?php

session_start();
foreach ($_SESSION['user'] as $key) {
	$name=$key["username"];
}
include  'component.php';
include '../connection/connection.php';
?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><?php
		
		$all="SELECT * FROM users where users_name!='$name'";
		$all_sql=mysqli_query($con,$all);
		


		
		while ($acc_row=mysqli_fetch_assoc($all_sql)) {
			$follow=$acc_row['users_name'];
			 $query = "SELECT * FROM user_following WHERE user_following_name='$name' and user_following_following='$follow'	
			  ";
			  $statement = mysqli_query($con,$query);
			  $total_row=mysqli_num_rows($statement);
			  $output='';
			  if ($total_row>0) {
			    $output="Unfollow";
			  }else{
			    $output="Follow";
			  }
			
				acc_to_follow($acc_row['users_name'],$acc_row['users_id'],$output);

			
			

			

		
			
			}
?>