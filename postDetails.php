<?php
    error_reporting(0);
    include "header.php";
	include "dbconnect.php";


    $ID=$_GET['edit_ID'];


   
    $s="SELECT * FROM post   WHERE id='$ID' ";

   
	$result=$conn->query($s);
    // <div class="w-100 d-flex justify-content-center border">
	// 			<div class="border w-80" >
 
    while($r=$result->fetch_assoc()){
        $username=$r['username'];
        $title=$r['title'];
        $ID=$r['id'];   
        $image=$r['image'];
        $description= $r['description'];
        $date = $r['date'];
    
        
       
      
       ?>
       <center>
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
                            <b> posted on:</b> <?= date('d-M-Y',date($date)) ?>
                            <b > by : <?= " ". $username ?>  </b>
                        </small>
                    </p>                    
                    <div class="card-body">
                        <h2 class="card-title"><?= $title ?></h2>
                        <p class="card-text w-75">
                            <?= $description ?>
                            
                        
                        </p>
                        <p class="card-text"></p>
                    
                        <div class=" w-50 d-flex justify-content-around mt-2">
                        <?php
                            if(!empty($_SESSION['username']) &&  $_SESSION['username']=== $username){
                                echo	"<a class='btn btn-warning' href='editForm.php?edit_ID=$ID'>Edit</a>";
                                echo	"<a class='btn btn-danger' href='delete.php?del_ID=$ID'>Delete</a>";
                                
                            }
																
															
						?>
                            
                        </div>
                        
                    </div>
                </div>
										
        <br> <br>

    </center>

  
		<?php 



    }

    
    // echo $ID;
    $s2 = "SELECT * FROM comments WHERE post_id='$ID' ";
    $result2 = $conn->query($s2);
  
    while($r2=$result2->fetch_assoc()){
        $id=$r2['comment_id'];
        $username2 = $r2['username'];
        ?>
        <div class="d-flex justify-content-center "> 
            
            <div style="width:80%" class="card ">
                <div class="card-header d-flex justify-content-between">
                    <div> 

                        <?= $r2['username'] ?>
                    </div>
               
                <div>
                <?php
                            if(!empty($_SESSION['username']) &&  $_SESSION['username']=== $username2){
                                echo	"<a  class='btn btn-secondary' href='commentForm.php?edit_ID=$id&post_ID=$ID'>Edit</a> ";
                                echo	"<a class='btn btn-danger' href='deleteComment.php?del_ID=$id&post_ID=$ID'>Delete</a>";
                                
                            }
																
															
						?>
                    
                </div>

              
                </div>
                 <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= $r2['description'] ?></p>
                      
                    </blockquote>
                  </div>
            </div>



        </div>
        <br>

  
		<?php 



    }

    ?>
    <div class="d-flex justify-content-center border "> 
        <div style="width:80%">  
            <form method="POST" action="postComment.php?edit_ID=<?=$ID?>" >
    
                <div style="width:80%" class="form-group">
                    <label for="exampleFormControlTextarea1"><b> Post a comment:</b> </label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Post your comment">

            </form>
       </div>
    </div>
  
	<?php 
   
   


    




?>
