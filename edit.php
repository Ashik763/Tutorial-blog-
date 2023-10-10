<?php
	error_reporting(0);
	include "dbconnect.php";
	
	session_start();
	
	$filename = $_FILES["fileToUpload"]["name"];
	$temp= $_FILES["fileToUpload"]["tmp_name"];

	$folder="uploads/".$filename;

	move_uploaded_file($temp,$folder);

$ID=$_GET['edit_ID'];

$title=$_POST['title'];
$description=$_POST['description'];

     if(strlen($folder)>8 ){
		$sql="UPDATE post SET title='$title', description='$description' ,
		image='$folder'
		 where id='$ID'";
		
	}
	else{
		$sql="UPDATE post SET title='$title', description='$description'
	     where id='$ID'";
	}

	
	
	
	
	if($conn->query($sql)){
		
		header('location:postDetails.php?edit_ID='.$ID);

		
		}
	else 
	echo "update failed";

	$conn->close();
?>