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

echo "hello";

while ($row = mysqli_fetch_assoc($result)){
	echo $row["visit"];
}
//$CurrentVisit = mysqli_fetch_assoc($result["visit"]);

//$NewVisit = $CurrentVisit+1;
//$UpdateField = mysqli_query($connection, "UPDATE resources SET visit = '$NewVisit'");
//echo $NewVisit;

?>


