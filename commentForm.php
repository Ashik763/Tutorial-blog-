<?php
	include "dbconnect.php";
	include "header.php";
	error_reporting(0);
	session_start();
	$ID=$_GET['edit_ID'];
	$ID2=$_GET['post_ID'];

	$email = $_SESSION["email"];
	$password = $_SESSION["password"];
	

	if(empty($email) || empty ($password)){
		header("location:login.php");
	}
	else{
		$sql="SELECT * FROM comments where comment_id='$ID'" ;
	$arr=$conn->query($sql);

	
	while($result = $arr->fetch_assoc()){
  
        $description = $result['description'];
        // $image = $result['image'];
    
        
      }
	
	

 
	}
	
?>


<!DOCTYPE html>
<html lang="en">
<body>	
<center>
	 <div  style="width:80%">
	<h1>	Update </h1>

	 <form method="POST" action="updateComment.php?edit_ID=<?= $ID ?>&post_ID=<?= $ID2 ?>" enctype="multipart/form-data">

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Your Comment: </label>
    <textarea value='<?php echo $description ?>'  name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
		<?php echo $description ?>
	</textarea>
	
  </div>
  <input class="btn btn-primary" type="submit" value="Update">
</form>
</div>
</center>
	
</body>