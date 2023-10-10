<?php
	// error_reporting(0);
	include "dbconnect.php";
	
	session_start();
	

$ID=$_GET['edit_ID'];
$ID2=$_GET['post_ID'];

$description=$_POST['description'];

	

	// echo $name,$description,$phone,$date;
	
	$sql="UPDATE comments SET  description='$description' 
	 where comment_id='$ID'";
	
	if($conn->query($sql)){
		// echo "<script> alert('Updated Successfully') </script>";
        header('location:postDetails.php?edit_ID='.$ID2);

		//echo "updated succesfully";
		}
	else 
	echo "update failed";

	$conn->close();
?>