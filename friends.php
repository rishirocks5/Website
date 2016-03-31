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

//<!--title showing number of friends-->
echo'<p id="number"></p>';

//<!--display name of friends-->
echo' <div id="id"></div>';

//<!--display image of friends-->
echo'<img id="id2" loop = "3">';



//get the active username
$user = ($_SESSION['username']);
//echo $user;
//find the active user's friends
$sql = mysql_query("SELECT * FROM FRIENDS WHERE firstuser = '$user' AND status =1");
//$friends = mysql_fetch_array($sql);
$num_friends = mysql_num_rows($sql);
//echo $num_friends;
$c =0;
while($friends = mysql_fetch_array($sql))
{
  //echo $friends['seconduser'];
  $u = $friends['seconduser'];
  //echo '<br>';
  $f[$c] = $u;   
  $c++;
}
//list of friends is store in the array variable $f

for($i=0; $i<$num_friends;$i++)
{
  $sql2 = mysql_query("SELECT * FROM USERS WHERE username = '$f[$i]'");  
  $data = mysql_fetch_array($sql2);
  $fn = $data['firstname'];
  $ln = $data['lastname'];
  $im = $data['pic'];
  
?>
  <script type="text/javascript">
  
  //create a paragraph element
  var par = document.createElement("P");
  var node = document.createTextNode(<?php echo json_encode($fn); ?>+" "+<?php echo json_encode($ln); ?>);
  par.appendChild(node);
  
  //create an image element
  var a = document.createElement("IMG");
  a.src = "images/"+<?php echo json_encode($im); ?>;
  
  //add the new elements to the page
  var element = document.getElementById("id");
   element.appendChild(par);
   element.appendChild(a);
  
  </script>

<?php
}

?>

<!-- Site footer -->
      <footer class="footer">
        <p>&copy; Web Schedule Room </p>
      </footer>
 
    </div> <!-- /container -->
  </body>
</html>



















					