<!DOCTYPE html>
<html lang="en">


  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
        
      <!-- Jumbotron -->
     
        <?php
 
 
			include("connect.php");
			include("menu.php");
                        
			error_reporting(0);
			 
			$info = mysql_query("SELECT * FROM USERS WHERE username='$user'");
			$get = mysql_fetch_array($info);
			  $user = ($_SESSION['username']) ;
			 
			if ($get){
			 
				$pic = $get['pic'];
			 
				echo '
				<div class="row">
				  <div class="col-md-4" class="well">
					<nav class="image"> 
					<img src="images/'.$pic.'" height="222" width="222">
					 
					</nav>';
				
				
				//make the submit do something...
                
echo '
    <form action="uploadimage.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit" style="margin-top: 5px;">
    </form> </div>
    ';
                                
				echo '<div class="col-md-6"> <h2> Name: ';
				echo    $get['firstname'] ;
				echo ' ';
				echo   $get['lastname'] ;
				echo '</h2> <h2> Email ID: ';  
                                echo   $get['email'] ;
                                echo '</h2></div></div>'; 
		
			}
        
        $add2 = $_POST['add']; 
                         $reject = $_POST['reject']; 

			if ($add2) {
		              $sql = mysql_query("UPDATE FRIENDS SET FRIENDS.status=1 WHERE FRIENDS.firstuser ='$add2' AND seconduser='$user'");
                              $sql2 = mysql_query("INSERT INTO FRIENDS VALUES ('$user','$add2',1)");
			      echo ' <script> alert("The user '.$add2.' has been added as a friend."); '; 
	           echo ' window.location.replace ("account.php"); </script>' ; 
                          }

                if ($reject) {
		      $sql3 = mysql_query("DELETE FROM FRIENDS WHERE firstuser ='$reject' AND seconduser='$user'"); 
			      echo ' <script> alert("You have rejected the friend request from the user '. $reject . '.");'; 
	           echo ' window.location.replace ("account.php"); </script>' ; 
                          }

			 

			 
			 
		?>  
      
      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Web Schedule Room </p>
      </footer>
    
    </div> <!-- /container -->
  </body>
</html>
																				