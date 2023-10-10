<?php
    // error_reporting(0);
	include "dbconnect.php";
	include "header.php";
	
	session_start();
	$s="SELECT * FROM post";
	$result=$conn->query($s);

	$email = $_SESSION["email"];
	$password = $_SESSION["password"];
	// echo $_SESSION["email"];

	if(empty($email) || empty ($password)){
		// header("location:login.php");
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ea8d639258.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
       <!-- <header>
            <div class="navbar">

                <div class="top-left">
                    <p>Tutorials</p>
                </div>

                <div class="top-right">

                    <div class="top-right-text">
                        <a href="index.php">Home</a>
						<a href="postForm.php">Add Post</a>
                       
                       <?php
					    if(empty($email)) {
							echo "<a href='login.php'>Login</a>";
						} 
						else{
							"";
						}
						
						?>  
                      
						
                    </div>
                    <div class="icon">
                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>


                        <i class="fa-regular fa-paper-plane-top"></i>
                    </div>


                </div>

            </div>

        </header> -->
<!-- main part -->


<style>
		
	</style>
</head>
<body>	

		<center> 
			<h1 class=''> Tutorials </h1>
			<i>A place of full of <span class='text-primary'>  Altruists <span> </i><br> <br>
			<div class="w-100 d-flex justify-content-center border">
				<div class=" " >
			
										<?php
										//$i=1;
										
										while($r = $result->fetch_assoc())
										{
											$username=$r['username'];
											$title=$r['title'];
											$ID=$r['id'];   
											$image=$r['image'];
											$description= $r['description'];
											$date = $r['date'];
											// echo $image
										
											
											
											?>
												<div  class="card mb-3 border">
													<div class="d-flex justify-content-center">
														
														<?php
															if(strlen($image)>8 ){
															echo	'<img style="max-width:80%; max-height:200px; object-fit: cover; " class="card-img-top" src='. $r['image'].'  alt="Card image cap">';
																
															}
																								
																							
														?>
													</div>
												<p>
														<small class="text-muted">
															 <b> posted on:</b> <?= date('d-M-Y',date($date)) ?><br>
															 <b > by : <?= " ". $username ?>  </b>
															 </small>
												</p>
													
													<div class="card-body">
														<h2 class="card-title"><?= $title ?></h2>
														<p class="card-text">
															<?= substr($description, 0,100) ?>
															<a href='postDetails.php?edit_ID=<?= $ID ?>' class='card-link'>..continue....</a>
														
														</p>
														<p class="card-text"></p>
													
													 	
														<!-- <div class=" w-50 d-flex justify-content-around">
															<?php
																// if(!empty( $_SESSION['username']) && $_SESSION['username']=== $username){
																//   echo	"<a class='btn btn-warning' href='editForm.php?edit_ID=$ID'>Edit</a>";
																//   echo	"<a class='btn btn-danger' href='delete.php?del_ID=$ID'>Delete</a>";
																	
																// }
																
															
															 ?>
														
														</div> -->

													
														
													  
													 	
														
														
														
														
														
													</div>
												</div>
											<?php 
										
								
										}
										?>
										
									
				</div>
			</div>
		</center> 

</body>
</html>



