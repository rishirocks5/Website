   
<?php 

include("connect.php");

if ($_POST){
$term = $_GET["term"] ;

$q=mysql_real_escape_string($_POST['searchword']);

$run = mysql_query("SELECT * FROM USERS WHERE username LIKE '%".$q."%' ORDER by username");

$output = array();


while($auto=mysql_fetch_array($run)){
    $image = $auto['pic'];
    $first = $auto['firstname'];
    $last = $auto['lastname'];
    
    ?>
<nav class="display_box" align="left">
<img src="images/
<?php echo $image; ?> " height="70" width="70"/>
<span class="name"> <?php echo $first; ?>&nbsp;</span>
</nav>



<?php
}}
else {}

/*
while($auto = mysql_fetch_array($run)){
    // $output[] = $auto['username'];
    
    $image = $auto['pic'];
    
    $output[]=array(
    "value"=> $auto['username'],
  //  'label'=> $auto["firstname"]."-".$auto["lastname"]
    "label"=> $auto['firstname'].", ".$auto['lastname']   
    );
  
  
    echo '<img id="face" src="images/'.$auto["pic"].'" height="60" width="60"> <br> Name: ' .$auto["firstname"]. ',' .$auto["firstname"]. '<br> Username: ' .$auto["firstuser"]. '';
   
}

echo json_encode($output);
*/

?>