<?php
include 'connection/connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <form method="post">
    <div class="login-container">
      <h1>Sign In</h1>
      <div class="form">
        <p>Enter username</p>
        <input type="text" name="username" placeholder="Username">
        <p>Enter password</p>
        <input type="text" name="userpass" placeholder="Password">
        <div>
          <button type="submit" name="submit">Sign in</button>
        </div>
        
      </div>

      <div class="line">
          <!-- line -->
          <div class="left-line"></div>
          <div> or </div>
          <div class="right-line"></div>
       </div>
       <div class="registration">
         <a href="registration.php">Create an account?</a>
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
$user=$_POST['username'];
$pass=$_POST['userpass'];
$user_login="SELECT * FROM users where users_name='$user' and users_password='$pass'";
$user_login_result=mysqli_query($con,$user_login);

if (mysqli_num_rows($user_login_result) > 0) {
	while ($user_row=mysqli_fetch_assoc($user_login_result)) {
		$user_id=$user_row["users_id"];
		$user_name=$user_row["users_name"];
		if (isset($_SESSION['user'])) {
			$count=count($_SESSION['user']);
			$item_array=array(
				'userid'=>$user_id,
				'username'=>$user_name
			);
			$_SESSION['user'][$count]=$item_array;
		}else{
			$item_array=array(
				'userid'=>$user_id,
				'username'=>$user_name
			);
			$_SESSION['user']['0']=$item_array;
		}
	}
	?>
	 <script type="text/javascript">
                swal({
                  title: 'SUCCESS!',
                	icon: 'success',
                 	}).then(function(){
                 		window.location='home.php';
                 	})
     </script>
	<?php
}else{
	?>
	 <script type="text/javascript">
                swal({
                  title: 'ERROR!',
                	icon: 'error',
                 	})
     </script>
	<?php
	}
}
?>