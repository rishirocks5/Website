<?php

 if(isset($_POST['submit'])){
    $to = "vipresh1993@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];

    $header = "From: noreply@example.com\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 
    mail($to,$subject,$message,$headers);
    echo "Mail sent! Not working!
}
?>
	