<?php
	if(isset($_GET['licence_num'])){
		$licence_num = $_GET['licence_num'];
		include 'connect.php';
		$query = "DELETE FROM users WHERE licence_num LIKE '{$licence_num}'";
		mysqli_query($conn,$query);
		header("Location: ../index.php");
		}
?>