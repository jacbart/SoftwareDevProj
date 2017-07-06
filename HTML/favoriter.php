<?php
// Parsing out a URL provided by ClearDB
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// Setting the variables required to connect to the database
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1); 

// Connects to MySQL Database on Heroku
$connect = mysqli_connect($server,$username,$password,$db);
if(!$connect)
{
    die(mysqli_error($connect).'because'.mysqli_errno($connect));
}

$name = $_REQUEST['name'];

$query = "select fav from users where name = $name;";
$favresult = mysqli_query($connect, $query);
$favs = explode(',', $favresult[0]);

$newfav = $_REQUEST['resourceid'];

if (!in_array($newfav, $favs)) {
	$addquery = "update users set fav = concat(fav, ',', '$newfav') where name = '$name';";
	echo $addquery;
	$addresult = mysqli_query($connect, $addquery);
}

?>
