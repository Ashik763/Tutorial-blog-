<?php
     error_reporting(0);
	include "dbconnect.php";
	
    session_start();

	$email = 	$_SESSION["email"];
	$password = $_SESSION["password"];


if(empty($email) || empty ($password)){
	// alert("please login");
	header("location:login.php");
}
else{
	$ID=$_GET['del_ID'];
	$ID2=$_GET['post_ID'];
	


	$sql="DELETE FROM comments WHERE comment_id='$ID'";

	
	if($conn->query($sql))
	{
		
		
		header('location:postDetails.php?edit_ID='.$ID2);
		//echo "Successfully deleted.";
	}
	else
	echo "Failed delete!";

}



$conn->close();
?>