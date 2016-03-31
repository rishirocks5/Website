<?php

session_start();

include("connect.php");
error_reporting(0);


$_SESSION['username'] = $_POST['username'];
 

if ((!($_POST['username']) || !($_POST['password']))) {
 echo ' <body>
    <script type="text/javascript">
 window.parent.location.href = "index.html";
</script> </body>';

} else {



$username = $_POST['username'];
$password = $_POST['password'];

$test = mysql_query("SELECT username
                      FROM   USERS
                      WHERE  username = '$username'
                      AND    password = '$password'");


$r = mysql_fetch_array ($test);
  

if ($username=="admin" && $r)
{
    echo ' <body>
    <script type="text/javascript">
 window.parent.location.href = "admin.php";
</script> </body>';
}

elseif ($r) {
        echo ' <body>
    <script type="text/javascript">
 window.parent.location.href = "account.php";
</script> </body>';
  }
    
  else {
    // No rows matched so login failed
     echo ' <body> 
    <script type="text/javascript">
 alert("Incorrect login attempt, either your username does not exist or your password is incorrect. Please try again.");
 window.parent.location.href = "index.html";
</script> </body>';
  }
}




?> 