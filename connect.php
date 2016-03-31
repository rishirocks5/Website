<?php 

$server = 'localhost';
$user = 'root';
$pass = '';

$conn = mysql_connect('$server', '$user', '$pass') or die("Not 
connecting.");

mysql_select_db('a2505460_cps630');

error_reporting(0);

?>
