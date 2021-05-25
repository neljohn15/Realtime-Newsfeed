
<?php
session_start();
foreach ($_SESSION['user'] as $key) {
	$name=$key["username"];
}
include  'component.php';
include '../connection/connection.php';

?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><?php

		$info="SELECT * FROM user_following,content where user_following.user_following_following=content.content_name and user_following.user_following_name='$name'  ORDER BY content_id DESC";
		$info_sql=mysqli_query($con,$info);
		while ($row=mysqli_fetch_assoc($info_sql)) {
			$ext = pathinfo($row['content_image'], PATHINFO_EXTENSION);
			if ($row['content_name']==$name) {
				$hide="";
			}else{
				$hide="none";
			}
			if ($ext=="jpg"||$ext=="png"||$ext=="jpeg"||$ext=="gif"){
			   picture($row['content_name'],$row['content_caption'],$row['content_image'],$hide);;
			}else{
				video($row['content_name'],$row['content_caption'],$row['content_image'],$hide);
			}
		}
		?>