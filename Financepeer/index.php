<?php
$server="localhost";
$username="root";
$password="";
$db="financepeer";
$conn=new mysqli($server,$username,$password,$db);
if($conn->connect_error){
  die("connection failed".$conn->connect_error);
}

$file = "data.json";
$data = file_get_contents($file);
$array = json_decode($data,true);

foreach ($array as $value) {
    $query = "INSERT INTO `users` (`userid`, `id`, `title`,`text`) values ('".$value['userId']."','".$value['id']."', '".$value['title']."', '".$value['body']."') ";
    mysqli_query($conn,$query);
}

header( "Location: Disp.htm" );
?>
