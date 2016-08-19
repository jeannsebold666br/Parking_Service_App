<?php
if(isset($_POST['start'])){
	include 'inc/check.php';
	if(!$check){
		$time = date("H:i:s");
		include_once 'connect.php';
		$query = "INSERT INTO users (licence_num,zone,time) VALUES ('{$licence_num}','{$zone}','{$time}')";
		$result = mysqli_query($conn,$query);
			if($result===true){
				?>
					<div id="result" class="start">
						<p>User is successfully added to database.</p>
						<a href="inc/hide.php"><img id="hide" src="images/delete.png" alt="hide" title="Hide"></a>
					</div>	
				<?php
			}else{
				?>
					<div id="result" class="stop">
						<p>Query failed.</p>
						<a href="inc/hide.php"><img id="hide" src="images/delete.png" alt="hide" title="Hide"></a>
					</div>	
				<?php	
				}
	}
}
?>