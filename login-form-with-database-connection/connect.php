<?php

/*$host="localhost";
$user="root";
$pass=" ";
$db="login";
$conn=new mysqli_connect($host,$user,$pass,$db);


if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
*/

$conn = mysqli_connect("localhost","root","","login") or die("Connection Failed : " . mysqli_connect_error());
?>