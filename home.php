<?php
session_start();
if ($_SESSION['user']=="") {
	header("location:login.php");
}
foreach ($_SESSION['user'] as $key) {
	$name=$key["username"];

}
include  'php/component.php';
include 'connection/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<form method="post" enctype="multipart/form-data">
	<div class="main">
		<!--nav-->
		<div class="nav">
			<h1>USER:<?php echo $name?></h1>
		</div>	
		<!--status upload-->
		
		<div class="topnav">
		  <a class="active">Home</a>
		  <a href="upload.php">Upload</a>
		  <a href="php/logout.php">Logout</a>
		  <input class="topnav-centered" type="text" placeholder="Search.." name="search">
		  <center><button class="search" type="submit" name="seaerch_button">Search</button><br></center>
		  
		</div>


		<!--news feed-->	
		<div class="main" id="news"></div>
	
		<!--acc to follow-->
		
			<div class="sidenav" id="follow_acc"></div>
		
		
		<!--user following-->
		<div class="user-following">
			<h2>PEOPLE YOU FOLLOW</h2>
			<div id="following"></div>

		</div>


	</div>	
	</form>
</body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="./js/login.js" async></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--real time-->
<script>
	$(document).ready(function() {


    function newsfeed() {
      $.ajax({
        type: 'POST',
        url: 'php/real_time_newsfeed.php',
        success: function(data) {
          $('#news').html(data);
        }
      });
    }
    newsfeed();
     setInterval(function() {
      newsfeed();
    }, 1000);
	  });

	$(document).ready(function() {


    function follow_acc() {
      $.ajax({
        type: 'POST',
        url: 'php/acc_to_follow.php',
        success: function(data) {
          $('#follow_acc').html(data);
        }
      });
    }
    follow_acc();
      setInterval(function() {
      follow_acc();
    }, 1000);
	  });

	$(document).ready(function() {


    function userfollowing() {
      $.ajax({
        type: 'POST',
        url: 'php/following.php',
        success: function(data) {
          $('#following').html(data);
        }
      });
    }
    userfollowing();
     setInterval(function() {
      userfollowing();
    }, 1000);
	  });
</script>

<!--following-->
<?php

if (isset($_POST['follow'])) {
	$acc_follow=$_POST['acc_name'];
	$prove="SELECT * FROM user_following where user_following_name='$name' and user_following_following='$acc_follow'";
	$prove_sql=mysqli_query($con,$prove);

		if (mysqli_num_rows($prove_sql)>0) {
		?>
		 <script type="text/javascript">
	                swal({
	                  title: 'Unfollow',
	                	icon: 'info',
	                 	});
	     </script>
		<?php
		$Unfollow="DELETE FROM user_following WHERE user_following_name='$name' and user_following_following='$acc_follow'";
		$Unfollow_sql=mysqli_query($con,$Unfollow);
		$Unfollows="DELETE FROM user_followers WHERE user_followers_follower='$name' and user_followers_name='$acc_follow'";
		$Unfollow_sqls=mysqli_query($con,$Unfollows);
		}else{
			?>
		 		<script type="text/javascript">
	                swal({
	                  title: 'SUCCESS FOLLOW',
	                	icon: 'success',
	                 	});
		     	</script>
			<?php
		$follow="INSERT INTO user_following(user_following_name,user_following_following)VALUES('$name','$acc_follow')";
		$follow_sql=mysqli_query($con,$follow);
		$follower="INSERT INTO user_followers(user_followers_name,user_followers_follower)VALUES('$acc_follow','$name')";
		$follower_sql=mysqli_query($con,$follower);
		}
	
	
}


//remove post
if (isset($_POST['remove'])) {
	$img_name=$_POST['post_name'];
	?>
		<script type="text/javascript">
	      swal({
	      title: 'Success delete post',
	      icon: 'success',
	      });
		</script>
    <?php
	$delete_pose="DELETE FROM content WHERE content_name='$name' and content_image='$img_name'";
	$delete_pose_sql=mysqli_query($con,$delete_pose);
}



//search
if (isset($_POST['seaerch_button'])) {
$search=$_POST['search'];
$_SESSION['search']=$search;
$search_title="SELECT content_caption FROM content where content_caption='$search'";
$search_title_sql=mysqli_query($con,$search_title);
if (mysqli_num_rows($search_title_sql)>0) {
	?>
		 <script type="text/javascript">
	                swal({
	                	
						title: 'FOUND',
	                	icon: 'success',
	                 	}).then(function(){
	                 		window.location ='search_file.php';
	                 	});
		 </script>
	<?php
}else{
	?>
		 <script type="text/javascript">
	                swal({
	                  title: 'None matches the input',
	                	icon: 'error',
	                 	});
		 </script>
	<?php
}
}
?>