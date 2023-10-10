<?php
error_reporting(0);
include "dbconnect.php";

session_start();

$filename = $_FILES["fileToUpload2"]["name"];
echo $filename;
$temp= $_FILES["fileToUpload2"]["tmp_name"];
echo $temp;

$folder="uploads/".$filename;
// echo $folder, $filename, $temp;
move_uploaded_file($temp,$folder);


$title=$_POST['title'];
$description=$_POST['description'];
$username=  $_SESSION["username"] ? $_SESSION["username"] : "root" ;

// echo $username;
// echo $title;
// echo $description;
// $t=;
// // echo($t . "<br>");
//  $ti=
// $price=$_POST['f_price'];
// $quantity=$_POST['f_quantity'];

// echo $name,$description,$price,$quantity;
$date=time();
// $t= date('d-M-Y',strtotime($date))

$sql = "INSERT INTO post (id,username,title, description,date,image) 
		VALUES (NULL,'$username','$title', '$description','$date','$folder')";

		
		if($conn->query($sql))
		{

			header('location:index.php');
		
			
		}
		else
		{
			echo "insertion failed";
		}
		
		
		$conn->close();
?>