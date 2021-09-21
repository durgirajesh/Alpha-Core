<?php

$server="localhost";
$username="root";
$password="";
$db="financepeer";

$conn=new mysqli($server,$username,$password,$db);
if($conn->connect_error){
  die("connection error".$conn->conect_error);
}
if (isset($_POST['l'])){
  $result = mysqli_query($conn,"SELECT * FROM signup WHERE email='" . $_POST["user"] . "' and password = '". $_POST["password"]."'");
  $count  = mysqli_num_rows($result);
}

if($count==0) {
  $message = "Invalid Username or Password!";
} else {
  header( "Location: about.htm" );
}
echo $message;

?>
