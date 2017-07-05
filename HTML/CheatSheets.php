<DOCTYPE html>
<html lang="en">
<head>
	<title>
		That CS Guide
	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible"
		  content="IE=edge,chrome=IE7">

	<meta name="viewport"
		  content="width=device-width, initial-scale=1.0">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet"
		  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		  crossorigin="anonymous">
	
	<!-- Loading Flat UI -->
	<link href="../CSS/flat-ui.css"
		  rel="stylesheet">

	<link rel="stylesheet"
		  type="text/css"
		  href="../CSS/main.css">

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous">
	</script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
			integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
			crossorigin="anonymous">
	</script>
	
	<!-- Loading local Javascript -->
	<script type="text/javascript"
			src="../JS/index.js">
	</script>
</head>

<body>
<?php
                    // url = parse_url(getenv("CLEARDB_DATABASE_URL"));//heroku database things
                    $server = $url["host"];
                    $username = $url["user"];
                    $password = $url["pass"];
                    $db = substr($url["path"], 1);
                    // Connects to your Database 
                    //this should connect to heroku sql
                    // $connection = mysqli_connect($server,$username2,$password,$db);
                    $connection = mysqli_connect("localhost","root","ejc786", "heroku_418f9cc765f4922");
                    if(!$connection){
                    die(mysqli_error($connection).'because'.mysqli_errno($connection));
                    }
                    $query = "select * from resources;";
                    $result = mysqli_query($connection, $query);
                    if(!$result){
                        die('Could query data: '.mysqli_error($connection).' because '.mysqli_errno($connection));
                    }
                    while ($row = mysqli_fetch_array($result)){
                        if($row['topic_id'] == 3){
                            echo '<tr>
				<td>
					'.$row[1].'
				</td>
				 <td>
					<form action="Puller.php" method="post">
	            			<button type="submit"
	                		style="border: 0; background: light blue"
					name="'.$row[2].'">
	                		Link
	            			</button>
            				</form>
			            <a href="'.$row[2].'"> Link </a>
                                </td>
                            </tr>';
                        }
                    }
                mysqli_close($connection);
                
?>
</body>
<!-- <td>".$row[1]."</td>
                                <td><a href=".$row[2]."> Click Here!</a></td> -->

