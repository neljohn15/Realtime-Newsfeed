<?php

function video($name,$caption,$image,$hide){
	$elements="
<form action=\"home.php\" method=\"POST\" enctype=\"multipart/form-data\">
<div class=\"feed\">
<center>
<div class=\"w3-container\">
  

  <div class=\"w3-card-4 w3-grey\" style=\"width:50%\">

    <div class=\"w3-container w3-center\">
      
      <h2 class=\"thicker\">$name</h2>
      
      <a href=\"images/$image\"><video style=\"width:80%\">
  		<source src=\"images/$image\" type=\"video/mp4\">
  	  </video></a>
      <h3>Title: $caption</h3>

      <div class=\"w3-section\">
        <button class=\"w3-button w3-blue\"><a download=\"$image\"  href=\"home.php?file=$image\">Download</a></button>
        <button class=\"w3-button w3-red\" name=\"remove\" style='display: $hide'>Remove</button>
        <input type=\"hidden\" name=\"post_name\" value=\"$image\">
      </div>
    </div>

  </div>
</div>
</center>
</div>
</form>
<br>
	";
	echo $elements;
}

function acc_to_follow($name,$id,$button){
	$elements="
	<form action=\"home.php\" method=\"POST\">
	<div  class=\"side\">
		<center><a>$name</a>
    <button type=\"submit\" name=\"follow\">$button</center>
		
			<input type=\"hidden\" name=\"acc_name\" value=\"$name\">
		
	</div><br>
	</form>
	";
	echo $elements;
}

function following($name){
	$elements="
			<h3>User: $name</h3>

	";
	echo $elements;
}

function searchpic($name,$caption,$image){
	$elements="

<div class=\"feed\">
<center>
<div class=\"w3-container\">
  

  <div class=\"w3-card-4 w3-grey\" style=\"width:50%\">

    <div class=\"w3-container w3-center\">
      
      <h2 class=\"thicker\">$name</h2>
      <a href=\"images/$image\"><img src=\"images/$image\" alt=\"Avatar\" style=\"width:80%\"></a>
      <h3>Title: $caption</h3>

      <div class=\"w3-section\">
        <button class=\"w3-button w3-blue\"><a download=\"$image\"  href=\"home.php?file=$image\">Download</a></button>
       
      </div>
    </div>

  </div>
</div>
</center>
</div>

<br>
	";
	echo $elements;
}




function picture($name,$caption,$image,$hide){
	$elements="
<form action=\"home.php\" method=\"POST\" enctype=\"multipart/form-data\">
<div class=\"feed\">
<center>
<div class=\"w3-container\">
  

  <div class=\"w3-card-4 w3-grey\" style=\"width:50%\">

    <div class=\"w3-container w3-center\">
      
      <h2 class=\"thicker\">$name</h2>
      <a href=\"images/$image\" ><img src=\"images/$image\" alt=\"Avatar\" style=\"width:80%\"></a>
      
      <h3>Title: $caption</h3>

      <div class=\"w3-section\">
        <button class=\"w3-button w3-blue\"><a download=\"$image\" href=\"home.php?file=$image\">Download</a></button>
        <button class=\"w3-button w3-red\" name=\"remove\" style='display: $hide'>Remove</button>
        <input type=\"hidden\" name=\"post_name\" value=\"$image\">
      </div>
    </div>

  </div>
</div>
</center>
</div>
</form>
<br>
	";
	echo $elements;
}



function searchvid($name,$caption,$image){
	$elements="

<div class=\"feed\">
<center>
<div class=\"w3-container\">
  

  <div class=\"w3-card-4 w3-grey\" style=\"width:50%\">

    <div class=\"w3-container w3-center\">
      
      <h2 class=\"thicker\">$name</h2>
     <a href=\"images/$image\"><video style=\"width:80%\">
  		<source src=\"images/$image\" type=\"video/mp4\">
  	  </video></a>
      <h3>Title: $caption</h3>

      <div class=\"w3-section\">
        <button class=\"w3-button w3-blue\"><a download=\"$image\"  href=\"home.php?file=$image\">Download</a></button>
       
      </div>
    </div>

  </div>
</div>
</center>
</div>

<br>
	";
	echo $elements;
}
