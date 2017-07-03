
<html>
<head>
    <title>wurk?</title>
</head>
<body>

<!-- credit: https://github.com/Goatella/Simple-PHP-Login -->

<?php 

echo $_POST['username'];

if (!$_POST['username']){
    echo $_POST['username'];
    echo '<br>';
    die('Username not input correctly.<br/>
    <a href="login.html"> Click</a> to try again');
    #########automatically redirect to proper page
    //header("Location: login.html");
}

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

//connect to database
$connection = mysqli_connect($server,$username,$password,$db);

//check connection
if (!$connection) {
    echo "<h4>Failed to connect to connect to MySQL: ".mysqli_connect_error();
    die();
}

$query = "select name from users WHERE name = '".$_POST['username']."';";
$result = mysqli_query($connection,$query);
if(!$result){
    die('Could query data: '.mysqli_error($connection).' because '.mysqli_errno($connection));
}

$userCheck = mysqli_num_rows($result);

if ($userCheck == 0){    //####################### redirect to proper page
    die('The username <b>'.$_POST['username'].'</b> does not exist in our database.
        <br/>
        <br/>
        If you think this is wrong <a href="login.html">try again</a>.
        <br/>
        <br/>
        Or <a href="SQLCreateAccount.php"> Click to create an account</a>
        <b>need to update link</b>');
}

// while($info = mysqli_fetch_array($check)){
    echo "Successfully logged in!<br/>";
    $_POST['username'] = stripslashes($_POST['username']);
    echo '<a href="trial.php"> Click here to continue!</a><b>make what happens here cleaner</b>';
    setcookie("ThatCSGuide", $_POST['username'], false); //I have no idea what this does
    ################################
    //todo: set this to a proper location
    header("Location: trial.php"); 
?>


</body>
</html>