<?php
session_start();
include("connect.php");

$x_first = $_POST['first'];
$x_last = $_POST['last'];
$x_email = $_POST['email'];
$x_duser = $_POST['duser'];
$x_dpass = $_POST['dpass'];

$sql =  "INSERT INTO USERS VALUES (NULL,:bind_user,:bind_pass,:bind_first,:bind_last,:bind_credit,:bind_email)";

if (!($x_first) || (!$x_last) || (!$x_email) || (!$x_duser) || (!$x_dpass))
{
    echo '<script type="text/javascript">alert("All fields are required for a user to register");
        location.href = "register.html";
        </script>';
}
else {
    $stid = mysql_query("SELECT username,email FROM USERS WHERE username = '$x_duser' OR email = '$x_email' ");

    $row = mysql_fetch_array($stid);
    
    if (!$row)
    {
    $stid2 = mysql_query("INSERT INTO USERS VALUES (NULL,'$x_duser','default.jpg','$x_duser.json','$x_first','$x_last','$x_dpass','$x_email')");

       mysql_fetch_array($stid2);
        echo'<script type="text/javascript">
        alert("Account has been created!");
         window.location.replace("screen.php");
        </script>';
       $filename = "json/".$x_duser.".json";
        $outputstring = "Time to make a json schedule'\n";
        file_put_contents($filename, $outputstring, FILE_APPEND | LOCK_EX);
    }
    
    if($row['username']==$x_duser){
        echo'<script type="text/javascript">
        alert("The desired username already exists, Please select another");
         window.parent.location.href = "index.html";
        </script>';
    }
    
        if($row['email']==$x_email){
        echo'<script type="text/javascript">
        alert("This email is already used, Please select another");
         window.parent.location.href = "index.html";
        </script>';
    }
  
}

?>