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
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 90%;
        }
        .flag {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
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
                    Cheat Sheets
                </font>
            </h1>
            <p>
                <font color="#24478f">
                    Quick Useful guides
                </font>
            </p>
            <div class="list-group">
                <?php
                    // $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

                    //heroku database things

                    // $server = $url["host"];
                    // $username = $url["user"];
                    // $password = $url["pass"];
                    // $db = substr($url["path"], 1);

                    // Connects to your Database 
                    //this should connect to heroku sql
                    $connect = mysqli_connect("localhost", "root", "Badbugga1!", "heroku_418f9cc765f4922");
                    // $connect = mysqli_connect($server,$username,$password,$db);
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
                        if($row['topic_id'] == 3)
                        {
                            echo "
                            <a href='visitCounter.php/?elemid=".$row[0]."' 
                            target='_blank' class='button'>".$row[1]."</a>
                            <button type='button'
                                    class='flag pull-right'
                                    onclick='myFunc(this)'
                                    name='".$row[0]."'
                                    >
                                        <img src='../IMG/clearFlag.ico' 
                                        alt='HTML5 Icon'
                                        style='width:20px;height:20px;'
                                        id='flag'
                                        name='hyperlink'>
                            </button><br>
                            ";

/*                            
class='list-group-item'
echo "<tr>";
                                echo "<td>";
                                echo "<a href='visitCounter.php/?elemid=".$row[0]."' target='_blank' 
                                class='list-group-item'>".$row[1]."</a>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<button type='button'
                                    class='pull-right'
                                    onclick='myFunc(this)'
                                    name='".$row[2]."'
                                    style='border: 0; background: transparent'>
                                        <img src='../IMG/clearFlag.ico'
                                            alt='HTML5 Icon'
                                            style='width:20px;height:20px;'
                                            id='flag'
                                            name='hyperlink'>
                                    </button>";
                                echo "</td>";
                            echo"</tr>";*/

                        }
                    }
                    mysqli_close($connect);
                ?>
                <button type='button'
                        class='pull-right'
                        onclick='myFunc(this)'
                        name='".$row[2]."'
                        style='border: 0; background: transparent'>
                            <img src='../IMG/redFlag.ico'
                                alt='HTML5 Icon'
                                style='width:20px;height:20px;'
                                id='flag'
                                name='hyperlink'>
                </button>
            </div>
        </div>
    </div>
</body>
