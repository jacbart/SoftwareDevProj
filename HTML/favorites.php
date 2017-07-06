<?php
// Parsing out a URL provided by ClearBD
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// Setting the variables required to connect to the database
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

// Connects to MySQL Database on Heroku
// $connect = mysqli_connect("localhost", "root", "pass", "heroku_418f9cc765f4922");
$connect = mysqli_connect($server,$username,$password,$db);
if(!$connect)
{
	die(mysqli_error($connect).'because'.mysqli_errno($connect));
}

// Gets topic id from the url
$topicid = $_REQUEST['topicid'];
// Creates query for mysql database
$topicQuery = "select * from topics;";
// Sends the query to mysql and checks if it worked
$topicResult = mysqli_query($connect, $topicQuery);
if(!$topicResult)
{
    die('Could query data: '.mysqli_error($connect).' because '.mysqli_errno($connect));
}
// Selects the proper row of data with id equal to topicid
while ($topicRow = mysqli_fetch_array($topicResult))
{
	if($topicRow['id'] == $topicid)
	{
		$topicResult = $topicRow;
	}
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

    <style>
        .button {
            background-color: #ffffff; /* Green */
            border: none;
            color: grey;
            padding: 15px 32px;
            text-align: left;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 90%;
        }
        .flag {
            background-color: #ffffff; /* Green */
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 8%;   
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="jumbotron col-md-8 col-md-offset-2">
            <h1>
                <font color="#24478f">
                	Favorites
                </font>
            </h1>
            <div class="list-group">
                <?php

                	// Creates a query to do stuff
                    $favquery = "select fav from users where name='".$_COOKIE['ThatCSGuide']."';";
					$resquery = "select * from resources;";
                    // Runs the query from above
                    $favresult = mysqli_query($connect, $favquery);
                    $resresult = mysqli_query($connect, $resquery);
                    if(!$favresult)
                    {
                        die('Could query data: '.mysqli_error($connect).' because '.mysqli_errno($connect));
                    }
					$favs = explode(',', mysqli_fetch_row($favresult)[0]);
					foreach ($favs as &$val) {
						$val = (int)$val;
					}
                    // Selects the rows the have the matching topic id of topicResults[0] and displays them
                    while ($row = mysqli_fetch_array($resresult))
                    {
                        if(in_array($row['id'], $favs))
                        {
							echo "
                            <a href='visitCounter.php/?elemid=".$row[0]."' 
                            target='_blank' class='button'>".$row[1]."</a>
                            <button type='button'
                                class='flag pull-right'
                                onclick='myFunc(this)'
                                id='".$row[0]."'>
                                    <img src='../IMG/clearFlag.ico' 
                                    alt='HTML5 Icon' 
                                    style='width:20px;height:20px;'>
                            </button>
                            ";
                       }
                    }
                    // Closes the variable connect
                    mysqli_close($connect);
                ?>
            </div>
        </div>
    </div>
</body>
