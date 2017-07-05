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

<body>`
    <div class="content">
        <div class="info">
            <h1 id="title">Python</h1>
            <p id="description">
                Python is a programming language that is loved by many in the computer science community. It processes code incredibly fast debuggin the programs are easy, seeing as bugs or poor inputs won't cause code to segmentation fault. Below are a few guides to help you get started with programming in python.
            </p>
        </div>

        <p id="beginner">
        list of Links to add to the database and connect to the webpage
        </p>
            <ul>
                <?php
                    //$connect = mysqli_connect("localhost", "root", "***", "heroku_418f9cc765f4922");
                    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		    //heroku database things

                    $server = $url["host"];
                    $username = $url["user"];
                    $password = $url["pass"];
                    $db = substr($url["path"], 1);

                    // Connects to your Database 
                    //this should connect to heroku sql
                    $connect = mysqli_connect($server,$username2,$password,$db);
                    if(!$connect){
                    die(mysqli_error($connect).'because'.mysqli_errno($connect));
                    }

                    $query = "select * from resources;";
                    $result = mysqli_query($connect, $query);
                    if(!$result){
                        die('Could query data: '.mysqli_error($connection).' because '.mysqli_errno($connection));
                    }
                      
                      while ($row = mysqli_fetch_array($result)){
                            if($row['topic_id'] == 1){
                                echo "<tr><li>
                                        <td>".$row[1]."</td>
                                        <td><a href=".$row[2]."> Link</a></td>
                                </li></tr>";
                                }
                      }
=======

                    while ($row = mysqli_fetch_array($result)){
                        if($row['topic_id'] == 1){
                            echo "<tr>
                                <td>".$row[2]."</td>
                                <td><a href=".$row[3]."> Link</a></td>
                            </tr>";
                        }
                    }
>>>>>>> 2ecd5d25b50033e9b51dca9edb692580436c5cc1
                mysqli_close($connect);
                ?>
                <!-- do we still need this stuff? -->
                <!--<li> <a href="https://www.programiz.com/python-programming">https://www.programiz.com/python-programming</a></li>
                <li> <a href="http://www.afterhoursprogramming.com/tutorial/Python/Introduction/">http://www.afterhoursprogramming.com/tutorial/Python/Introduction/</a></li>
                <li> <a href="https://cscircles.cemc.uwaterloo.ca/">https://cscircles.cemc.uwaterloo.ca/</a></li>
                <li> <a href="https://www.youtube.com/playlist?list=PLlgoYPTU6ljCEggReCMF0m0760QTot9Qz">https://www.youtube.com/playlist?list=PLlgoYPTU6ljCEggReCMF0m0760QTot9Qz</a></li>-->
            </ul>
        <p>
        Potentially, these might be more of an embedded format as opposed to direct links.
        </p>
    
        <p id="internediate">
            
        </p>
    
        
    </div>
</body>
