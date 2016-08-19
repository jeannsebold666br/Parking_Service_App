<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dBaseName = 'parking';
$conn = mysqli_connect($serverName,$userName,$password,$dBaseName);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());	
}
?>