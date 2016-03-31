<?php

session_start();
include("connect.php");
error_reporting(0);

?>

<html>

<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
<title> WSR </title>

<link href="icon.ico" rel="shortcut icon" type="image/x-icon">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">
    
    <link href="css/justified-nav.css" rel="stylesheet"> 
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
       <script src="js/bootstrap-dropdownhover.min.js"></script>

    <script src="bootbox.min.js"></script>
    
  <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
    
    <script type="text/javascript" src="jquery.js"></script>
    
    <script type="text/javascript" src="jquery-1.8.0.min.js"></script>
    
</head>

<body>
    
    
          <div class="masthead">
        <h3 class="text-muted"> <img src="img/logo.png" alt="logo" height="60" width="60"> Web Schedule Room</h3>
        <nav>
          <ul class="nav nav-pills nav-justified">
            <li class="active"><a href="account.php">Profile</a></li>
			<li class="active"><a href="#">Schedule</a></li>
            <li class="active"><a href="friends.php">Friends</a></li>
             <li role="presentation" class="active dropdown">

<?php
     $user = ($_SESSION['username']) ;
                  
              $sql= mysql_query("SELECT FRIENDS.* ,USERS.* FROM FRIENDS,USERS WHERE FRIENDS.seconduser='$user' AND FRIENDS.firstuser= USERS.username AND FRIENDS.status=0");
			 
			 
			//if ($sql) {echo $run['firstuser'] ; } 
		
        if (mysql_num_rows($sql) == 0){
    echo ' <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Notifications
    <span class="caret"></span></a>  
    <ul class="dropdown-menu">
      <li> No new notifications </li>
    </ul>  ';         
        
        }
                        $row ; 
       
			if (mysql_num_rows($sql) > 0)
				{    
echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Notifications
  
    <span class="caret"></span>
      <aside class="notification"> ! </aside>
    </a>
    <ul class="dropdown-menu"> ';       
        
      
while( $row =  mysql_fetch_array($sql)) {

     echo '<li> <h4> Friend request from: </h4>  
     <br> <img id="face" src="images/'.$row["pic"].'" height="60" width="60"> <br> Name: ' .$row["firstname"]. ',' .$row["firstname"]. '<br> Username: ' .$row["firstuser"]. '';
echo "<form method='post' action='account.php'> <button class='btn btn-primary' name='add'  value ='". $row['firstuser']."'> Accept Friend Request </button> 
            <button class='btn btn-primary' name='reject'  value ='". $row['firstuser']."'> Reject Friend Request </button>  
                               </form> <br> </li>"; 
                         }
     echo '    </ul>
       ';

	 
		}
              
     ?>         
  
              </li>
			<li class="active"><a href="javascript:logout()">Log Out</a></li>
          </ul>
        </nav>     
      </div>
    
    <br>
    <?php 
     echo '<table border="0">
        <tr>
   <td><form method="post" action="search.php">';
    ?>
        
        <nav class="well">
        <?php
        
      //  $run = mysql_query("SELECT * FROM USERS"); 
      //  $auto = mysql_fetch_array($run);
    echo '
    <nav class="content">
    <input type="text" class="search" id="tags"  style="color:midnightblue"  placeholder="Search WSR" autocomplete="off" />&nbsp; &nbsp; <br/>
    <nav id="display">
     </nav>
     </nav>
    <button class="btn btn-info" role="button"> <i class="glyphicon glyphicon-search"></i> 
    </button>
        </nav> 
    
    
    </form> </td>

   ';
  
    echo'   
    
    </tr>
    </table> ';
            
                        
     
    
    ?>

            
<script>
       
    $(function() {
        $(".search").keyup(function()
        {
        var tags = $(this).val();
        var data = 'searchword='+tags;
        if (tags==''){}
         else {
            $.ajax({
            type:"POST",
            url:"autocomplete.php",
            data:data, 
            cache:false,
            success:function(html)
            {
              $("#display").html(html).show();
            }
            });
         } 
            return false; 
        });
                       
jQuery("#display").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<nav/>").html($name).text();
    $('#tags').val(decoded);
});
        
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#display").fadeOut(); 
    }
 
});
        $('#tags').click(function(){
    jQuery("#display").fadeIn();
});
        
        });
        </script>
    
<!--
 <script type="text/javascript">
        
     $(function(){
      $("#tags").autocomplete({
           source: 'autocomplete.php',
            minLength:1,
           setfocus:true
    $("#display").html(html).show();
    });
      });    
-->
        
        <script>
        
    function logout(){
    window.location.replace("index.html");
    }
    
    function account(){
    window.location.replace("account.php");
    }
   

    $('li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
});
        
        </script>
         
       
    <br> <br> <br> <br>
    </body>
</html>