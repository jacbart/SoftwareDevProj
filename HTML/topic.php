<?php
//heroku database things
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

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

// Gets topic id
$topicid = $_REQUEST['topicid'];
$topicid = (int)$topicid;
$topicQuery = "select * from topics where id=".$topicid.";";
$topicResult = mysqli_query($connect, $topicQuery);
if(!$topicResult)
{
    die('Could query data: '.mysqli_error($connect).' because '.mysqli_errno($connect));
}
?>
<!DOCTYPE html>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
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
    <div class="row">
        <div class="jumbotron col-md-8 col-md-offset-2">
            <h1>
                <font color="#24478f">
                    <?php echo ".$topicResult[1]."?>
                </font>
            </h1>
            <p>
                <font color="#24478f">
                    <?php echo ".$topicResult[2]."?>
                </font>
            </p>
            <div class="list-group">
                <?php
                    $query = "select * from resources;";
                    $result = mysqli_query($connect, $query);
                    if(!$result)
                    {
                        die('Could query data: '.mysqli_error($connect).' because '.mysqli_errno($connect));
                    }
                      
                    while ($row = mysqli_fetch_array($result))
                    {
                        if($row['topic_id'] == 1)
                        {
                            echo "<a href='visitCounter.php/?elemid=".$row[0]."' target='_blank' 
                            class='list-group-item'>".$row[1]."</a>";
                        }
                    }
                    mysqli_close($connect);
                ?>
            </div>
        </div>
    </div>
</body>
