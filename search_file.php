<?php
session_start();
include  'php/component.php';
include 'connection/connection.php';
$search=$_SESSION['search'];
?>
<a href="home.php">Back</a>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/home.css">

<?php
$search_title="SELECT * FROM content where content_caption='$search'";
$search_title_sql=mysqli_query($con,$search_title);
while ($row=mysqli_fetch_assoc($search_title_sql)) {
	$ext = pathinfo($row['content_image'], PATHINFO_EXTENSION);
	if ($ext=="jpg"||$ext=="png"||$ext=="jpeg"||$ext=="gif"){
			   searchpic($row['content_name'],$row['content_caption'],$row['content_image']);
			}else{
				searchvid($row['content_name'],$row['content_caption'],$row['content_image']);
			}
	
}
?>