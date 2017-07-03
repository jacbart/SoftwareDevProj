<?php
//$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//$server = $url["host"];
//$username = $url["user"];
//$password = $url["pass"];
//$db = substr($url["path"], 1);

//connect to database
//$connection = mysqli_connect($server,$username,$password,$db);

//check connection
//if (!$connection) {
//	echo "<h4>Failed to connect to connect to MySQL: ".mysqli_connect_error();
//	die();
//}

$Connect = mysql_connect('Localhost','root','');
$Database = mysql_select_db("ThatCSGuide");
$Result = mysql_query("SELECT * FROM resources");

$CurrentVisit = mysql_fetch_assoc($Result["visit"]);

$NewVisit = $CurrentVisit+1;
$UpdateField = mysql_query("UPDATE resources SET visit = '$NewVisit'");
echo $NewVisit;















?>
