<?php
$conn=mysqli_connect("localhost","root","") or die("connection failed");
$query=mysqli_select_db($conn,"mydb");
 if($query)
 { 	echo "connection ok"; }
 else
 {
 	echo " connection failed";
 }
?>