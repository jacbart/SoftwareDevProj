<?php
	$urllink = $_GET['urllink'];
	echo "<script type='text/javascript' src='../JS/index.js'></script>";
	//$connect = mysqli_connect("localhost", "root", "***", "heroku_418f9cc765f4922");
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	//heroku database things

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	// Connects to your Database 
	//this should connect to heroku sql
	$connect = mysqli_connect($server,$username,$password,$db);
	if(!$connect)
	{
		die(mysqli_error($connect).'because'.mysqli_errno($connect));
	}

	$query = "select * from resources;";
	$result = mysqli_query($connect, $query);
	if(!$result)
	{
		die('Could query data: '.mysqli_error($connect).' because '.mysqli_errno($connect));
	}

	  
	while ($row = mysqli_fetch_array($result))
	{
		if($row['resource'] == $urllink)
		{
			// echo "In resource row";
			$currentVisit = $row['visit'];
			$newVisit = $currentVisit+1;
			$updateVisit = "update resources set visit=".$newVisit." where id=".$row['id'].";";
			$newresult = mysqli_query($connect, $updateVisit);
			if(!$newresult)
			{
				die('Could query data: '.mysqli_error($connect).' because '.mysqli_errno($connect));
			}
			echo "<body onload='OpenInNewtab('".$urllink."')'></body><br>";
		}
	}
	// echo "finished loop";
	mysqli_close($connect);
?>