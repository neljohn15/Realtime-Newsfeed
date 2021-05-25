<?php
include 'connection/connection.php';
session_start();
if ($_SESSION['user']=="") {
	header("location:login.php");
}
foreach ($_SESSION['user'] as $key) {
	$name=$key['username'];
}
?>
<a href="home.php">Back</a>
<link rel="stylesheet" type="text/css" href="css/home.css">
<div class="center">
<form method="POST" enctype="multipart/form-data">

	<label for="img">Upload</label>
	<input type="file" name="img" id="img">
	<label for="cap">Title</label>
	<input type="text" name="caption"><br>
	<br>

	<button type="submit" name="upload">Upload</button>
</form>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="./js/login.js" async></script>
</div>
<?php

if (isset($_POST['upload'])) {
$file=$_FILES['img']['name'];
$tmp_name=$_FILES['img']['tmp_name'];
$caption=$_POST['caption'];


	if ($file =="" || $caption=="") {
			?>
		 <script type="text/javascript">
	                swal({
	                  title: 'No file or No Title',
	                	icon: 'error',
	                 	});
	     </script>
		<?php
		}else{
			move_uploaded_file($tmp_name, "images/".$file);
			$upload="INSERT INTO content(content_image,content_name,content_caption) VALUES('$file','$name','$caption')";
				$upload_sql=mysqli_query($con,$upload);
				?>
		 		<script type="text/javascript">
	                swal({
	                  title: 'SUCCESS upload',
	                	icon: 'success',
	                 	}).then(function(){
	                 		window.location='home.php';
	                 	})
	     		</script>
				<?php
		}	


	

}
?>