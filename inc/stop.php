<?php
	if(isset($_POST['stop'])){
		include_once 'connect.php';
		$time = date("H:i:s");
		$query = "SELECT * FROM users WHERE licence_num LIKE '{$licence_num}'";
		$result = mysqli_query($conn,$query);	
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result)){
				?>
	  			<div id="result" class="stop">
                    <p><strong>Licence number:</strong> <?php echo $row['licence_num']; ?></p>
                    <p><strong>Zone:</strong> <?php echo $row['zone']; ?></p>
                    <p><strong>Start time:</strong> <?php echo $row['time']; ?></p>
                    <p><strong>End time:</strong> <?php echo $time; ?></p>
                    <p><strong>Duration:</strong> <?php 
						$hours = floor((strtotime($time) - strtotime($row['time']))/3600);
						$minutes =floor((strtotime($time) - strtotime($row['time']))/60);
						if($minutes>=60){
							$minutes = $minutes % 60;
						}
						if($minutes<10){
							$minutes = "0" . $minutes;
						}
						$seconds = (strtotime($time) - strtotime($row['time']))%60;
						if($seconds>=60){
							$seconds = $seconds % 60;
						}
						if($seconds<10){
							$seconds = "0" . $seconds;
						}
					echo $hours . ":" . $minutes . ":" . $seconds;
					?></p>
                        <p><strong>Costs: </strong><?php 
							switch($row['zone']){
								case "First":
									$per_hour = 100;
										break;
								case "Second":
									$per_hour = 80;
										break;
								case "Third":
									$per_hour = 50;
										break;
							}
							$cost = round((($hours + ($minutes/60)) * $per_hour),2);
							echo "$cost" . " RSD";
						?></p>
                        <a href="inc/delete.php?licence_num=<?php echo $row['licence_num']; ?>"><img id="hide" src="images/delete.png" alt="delete" title="Delete"></a>
                </div>
                    <?php	
						}
		}else {
			?>
                <div id="result" class="stop">
                <p>There is no car with the licence number <?php echo $licence_num; ?> in the database.</p>
                <a href="inc/hide.php"><img id="hide" src="images/delete.png" alt="hide" title="Hide"></a>
                </div>
            <?php	
		}
}
?>