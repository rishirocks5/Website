<?php

session_start();
include("connect.php");
error_reporting(0);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>WSR</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted"> <img src="img/logo.png" alt="logo" height="60" width="60">   Web Schedule Room</h3>
        <nav>
          <ul class="nav nav-justified">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">About</a></li>
	    <li><a href="contact.html">Contact</a></li>
            <li class="active"><a href="#">Sign In</a></li>
            <li><a href="register.html">Register</a></li>
          </ul>
        </nav>
      </div>


      <form class="form-signin" method="post" action = "login.php">
        <h2 class="form-signin-heading">Sign in:</h2>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
		
		<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" role="button" value="Sign in" >
        <input type="button" id="register" name="register" class="btn btn-lg btn-primary btn-block" value="Register" onClick = "location.href = 'register.html'" />
      </form>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Web Schedule Room</p>
      </footer>

    </div> <!-- /container -->
	<script src="js/bootstrap.js"></script>
  </body>
</html>
