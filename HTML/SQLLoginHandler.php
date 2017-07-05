
<html>
<head>
    <title>SQLLoginHandler</title>

    <script type="text/javascript"
        src="../JS/index.js">
    </script>
</head>
<body>

<!-- credit: https://github.com/Goatella/Simple-PHP-Login -->

<?php 

if (!$_POST['username']){//check if username was passed in post correctly
    die("
        <script language='javascript'>
            alert('Username not passed correctly. That's on our end sorry. Try again!');
            window.location.href='login.html';
        </script>
    ");
}

// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));//heroku database things

// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

// Connects to your Database 
// $connection = mysqli_connect($server,$username,$password,$db);
$connection = mysqli_connect("localhost","root","Badbugga1!", "ThatCSGuide");
if (!$connection) {
    echo "<h4>Failed to connect to MySQL: ".mysqli_connect_error();
    die();
}

// Send the query to SQL
$query = "select name from users WHERE name = '".$_POST['username']."';";
$result = mysqli_query($connection,$query);
if(!$result){
    die('Could query data: '.mysqli_error($connection).' because '.mysqli_errno($connection));
}

// Check if the user was found in the database
$userCheck = mysqli_num_rows($result);
if ($userCheck == 0){ //if not display an alert and return to the login page
    die("
        <script language='javascript'>
            alert('Username not found, login unsuccessful. Have you created an account?');
            window.location.href='login.html';
        </script>
    ");
}

// The username is in the database so put the username as 
// a cookie and redirect to the home page 
$_POST['username'] = stripslashes($_POST['username']);
setcookie("ThatCSGuide", $_POST['username'], false);
header("Location: index.html"); 
?>


</body>
</html>