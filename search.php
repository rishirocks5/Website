<!DOCTYPE html>
<html lang="en">
 
  <body>

    <div class="container">

      <!-- Jumbotron -->
	  
	  <?php

		include("connect.php");
		include("menu.php");
		error_reporting(0);

		$user = ($_SESSION['username']) ;
		$search = $_POST['search'];
		$logout = $_POST['logout'];
		$result = $_REQUEST['result'];

		$account = mysql_query("SELECT * FROM USERS WHERE username != 'admin' AND ((username='$search' OR username='$result') OR (firstname='$search' OR firstname='$result') OR (lastname='$search' OR lastname='$result') OR (email='$search' OR email='$result'))");
		$run = mysql_fetch_array($account);

		if ($run){
			
			$pic = $run['pic'];
			

			echo '<div class="row"> <div class="col-md-4"><img id="face" src="images/'.$pic.'" height="222" width="222"></div> <div class="col-md-4"><h2> Name: ';
			echo $run['firstname'];
			echo ' ';
			echo $run['lastname'];
			echo '</h2><h2>Email ID: ';
                        echo $run['email'] ;
                        echo '</h2><br>';
			
		echo "<form method='post' action='add.php'> <button class='btn btn-success' id='add' name='add' value='".$run['username']."'> Add </button> </form> </div></div>";

		}

		$friend2 = $run['username'];
		 $add = $_POST['add']; 

		$sh = mysql_query("SELECT * FROM FRIENDS WHERE firstuser = '$user' AND seconduser = '$friend2' OR (firstuser='$friend2' AND seconduser='$user')");
		if (mysql_num_rows($sh)!=0) { echo '<script type="text/javascript"> document.getElementById("add").style.visibility = "hidden" ; </script> '; }

		if (mysql_num_rows($sh)==1 && $sh['status']==0){
			echo 'Friend request has been sent. Waiting for response.' ; 
		} 

		if (mysql_num_rows($sh)>1)
		{
		echo 'Time to get a schedule going.' ;
		   
		?>

		<html ng-app='ToDo'>
		<head>
		<script src='http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js'>
		</script>

		</head>
			<body>
					<nav  ng-controller="schController"> 
				<li ng-repeat="todo in todos"> 
		   <span ng-class="{'complete':todo.complete}"> 
			   Title: {{todo.task}} <br/> 
			   Description: {{todo.description}}  
		   </span> 
					</nav> 
		<script>
		var todoapp = angular.module('ToDo',[]);

		 var x = "<?php echo $friend2; ?>" ;
					
				 //   alert(x);
				 //   console.log('The value of x is' + x);
					
		todoapp.controller('schController', function($scope,$http){$http.get("json/"+ x +".json").then(function(response) {
				$scope.todos = response.data.todo;
					  
					});
					});
					
		</script> 
				
			</body>
		</html>


			<?php
			
		}

		if ($run['username']==$user){
		  
			echo ' <script type="text/javascript">
		 window.location.replace("account.php");
		</script>';  
			
		}


		if (!($run)) {
			echo '<h1> Sorry, we could not find who you have searched for. </h1>';
		}

		?>
	  
	  <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Web Schedule Room</p>
      </footer>
        

    </div> <!-- /container -->

  </body>
</html>
		