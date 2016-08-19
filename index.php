<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700italic,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="wrapper">
    	<div id="main">
        	<img src="images/parking.png" alt="parking" title="Parking service">
            <form action="#" method="post">
            <table>
            	<tr>
                	<td rowspan="3">
                    	<input type="text" name="licence_num" placeholder="Licence number...">
                    </td>
                    <td rowspan="3">
                    	<select name="zone">
                    		<option value="First">First</option>
                            <option value="Second">Second</option>
                            <option value="Third">Third</option>
                    	</select>
                    </td>
                    <td>
                    	<input type="submit" name="start" value="Start">
                    </td>
                </tr>
                <tr>
                	<td>
                    	<input type="submit" name="status" value="Status">
                    </td>
                </tr>
                <tr>
                	<td>
                    	<input type="submit" name="stop" value="Stop">
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <?php
			if(isset($_POST['start']) || isset($_POST['status']) || isset($_POST['stop'])){
				if(!empty($_POST['licence_num'])){
					$licence_num = trim($_POST['licence_num']);
					$zone = trim($_POST['zone']);
					include 'inc/start.php';
					include 'inc/status.php';
					include 'inc/stop.php';
				}else{
					?>
                    	<div id="result" class="stop">
                            	<p>Please enter licence number!</p>
                                <a href="inc/hide.php"><img id="hide" src="images/delete.png" alt="hide" title="Hide"></a>
                           </div>				
                    <?php
					}
			}
		?>
    </div>
</body>
</html>
