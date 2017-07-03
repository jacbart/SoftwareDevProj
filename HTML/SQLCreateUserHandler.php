<html>
<head><title>CreateUserHandler</title></head>
<body>
<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

//connect to database
$connection = mysqli_connect($server,$username,$password,$db); 
// $connection = mysqli_connect("localhost","root","Badbugga1!", "ThatCSGuide");

//check connection
if (!$connection) {
	echo "<h4>Failed to connect to connect to MySQL: ".mysqli_connect_error();
	die();
}

$maxid = mysqli_query($connection, "select max(id) from users");

if ($maxid) {
	$newid = mysqli_fetch_row($maxid)[0] + 1;
}
else {
	$newid = 1;
}

$usr = $_REQUEST['username'];

$namecheckquery = mysqli_query($connection, "select name from users where name = '".$usr."';");
$namecheck = mysqli_num_rows($namecheckquery);
if ($namecheck) {
	echo "<p>Username taken</p>";
	echo "<a href=\"/HTML/createuser.html\">Back to create user</a>";
}
else {
	$insertquery = "insert into users (id, name)
  				values ($newid, \"$usr\")";
  
  mysqli_query($connection, $insertquery);
	echo "<p>New account created successfully!</p>";
	echo "<a href=\"/HTML/login.html\">Back to login page.</a>";
}

//include 'createuser.html';
?>
</body>
</html>
