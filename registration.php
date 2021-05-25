<?php
include 'connection/connection.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <form method="post">
    <div class="login-container">
      <h1>Sign Up</h1>
      <div class="form">
        <p>Enter username</p>
        <input type="text" name="user_name" placeholder="Username" required>
        <p>Enter password</p>
        <input type="text" name="user_pass" placeholder="Password" required>
        <div>
          <button type="submit" name="submit">Sign up</button>
        </div>
        
      </div>
    </div>
    
  </form>
  

</body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<?php

if (isset($_POST['submit'])) {
$name=$_POST['user_name'];
$pass=$_POST['user_pass'];

	$user_check="SELECT * FROM users where users_name='$name' and users_password='$pass'";
	$user_check_query=mysqli_query($con,$user_check);
	if (mysqli_num_rows($user_check_query)==0) {
		$user_add="INSERT INTO users(users_name,users_password)VALUES('$name','$pass')";
		$user_add_query=mysqli_query($con,$user_add);
		?>
		 <script type="text/javascript">
	                swal({
	                  	title: 'SUCCESS!',
	                	icon: 'success',
	                 	}).then(function(){
	                 		window.location='login.php';
	                 	});
	     </script>
		<?php
	}else{
		?>
		 <script type="text/javascript">
	                swal({
	                  	title: 'ERROR!',
	                  	text:'user exist already',
	                	icon: 'error',
	                 	}).then(function(){
	                 		window.locaton='registration.php';
	                 	});
	     </script>
		<?php
	}

	$follow_own="SELECT * FROM user_following where user_following_name='$name' and user_following_following='$name'";
	$follow_own_sql=mysqli_query($con,$follow_own);
	if (mysqli_num_rows($follow_own_sql)>0) {
	}else{
		$follow="INSERT INTO user_following(user_following_name,user_following_following)VALUES('$name','$name')";
		$follow_sql=mysqli_query($con,$follow);
	}


}




?>

