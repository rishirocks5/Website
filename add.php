<!DOCTYPE html>
<html lang="en">
 
  <body>

    <div class="container">

<?php

include("connect.php");
include("menu.php");
error_reporting(0);

$user = ($_SESSION['username']) ;
$search = $_POST['search'];
$logout = $_POST['logout'];

$account = mysql_query("SELECT * FROM USERS WHERE username != 'admin' AND ((username='$search') OR (firstname='$search') OR (lastname='$search') OR (email='$search'))");
$run = mysql_fetch_array($account);

if ($run){
    
    $pic = $run['pic'];
    
    echo '<br><br><br>';
     echo '<br><img id="face" src="'.$pic.'" height="222" width="222"> <h2>';
    echo $run['firstname'];
    echo ' ';
    echo $run['lastname'];
    echo '</h2>';
    
echo "<form method='post' action='add.php'> <button class='btn btn-info' name='add'> Add </button> </form> ";

}

$friend2 = $run['username'];
 $add = $_POST['add']; 

$sh = mysql_query("SELECT * FROM FRIENDS WHERE firstuser='$user' AND seconduser = '$friend2'");
 
if (mysql_num_rows($sh)!=0) { echo '<script type="text/javascript"> document.getElementById("addME").style.visibility = "hidden" ; </script> '; }



if ($run['username']==$user){
  
    echo ' <script type="text/javascript">
 window.parent.location.href = "account.php";
</script>';  
    
}



  //  $friend = $run['username'];

    $check= mysql_query("SELECT * FROM FRIENDS WHERE (firstuser='$user' AND seconduser='$friend2') OR (firstuser='$friend2' AND seconduser='$user')");
     
   if ($check)  
{
$add2 = mysql_query("INSERT INTO FRIENDS VALUES ('$user', '$add',0)");
   $search = $add;
   //sending email
   $text = "Dear ".$add."you have a friend request from ".$user ;
   $text = wordwrap($text,70,"\r\n");
   $subject = "Friend Request";
   $s = mysql_query("SELECT * FROM USERS WHERE username = '$add'");
   $email = mysql_fetch_array($s);
   $header = "header";
   mail($email['email'],$subject,$text,$header,"-fadmin@cps630project.net23.net");
   //echo $email['email'];
   //echo $subject;
   //echo $text;
  echo  '
  <script>
  //alert("here'.$text.'"); 
  alert("You have sent a friend request to the user '.$add.'."); 
  
    window.parent.location.href = ("search.php?result='.$add.'");</script>' ;
} 
        
?>	