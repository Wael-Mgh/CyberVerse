<?php  

$con = mysqli_connect("localhost", "root","");
if(!$con)
die("Could not connect to the server - " .mysqli_connect_error());
 mysqli_select_db($con , 'project')
or die("<br>Could not connect to the DB - " .mysqli_error($con));
 
?>