<?php
	include_once 'connect.php';
	$query = "SELECT * FROM users WHERE licence_num LIKE '{$licence_num}'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			?>
				<div id="result" class="stop">
					<p>User with the licence number <?php echo $row['licence_num']; ?> is already in database.</p>
					<a href="inc/hide.php"><img id="hide" src="images/delete.png" alt="hide" title="Hide"></a>
				</div>
			<?php
		}
		$check = true;
	}else{
		$check = false;
	}
?>