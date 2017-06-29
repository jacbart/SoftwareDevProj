
<html>
<head>
    <title>wurk?</title>
</head>
<body>

<?php 

echo $_POST['username'];

if (!$_POST['username']){
    echo $_POST['username'];
    echo '<br>';
    die('Username not input correctly.<br/>
    <a href="login.html"> Click</a> to try again');

    // header("Location: login.html");
}


// Connects to your Database 
$connection = mysqli_connect("localhost","root","Badbugga1!", "ThatCSGuide");

if (!connection){
    die(mysqli_error($connection).' because'.mysqli_errno($connection));
} 

$query = "select name from users WHERE name = '".$_POST['username']."';";
$result = mysqli_query($connection,$query);

if(!$result){
    die('Could query data: '.mysqli_error($connection).' because '.mysqli_errno($connection));
}

while ($row = mysqli_fetch_array($result,MYSQLI_NUM)){
    echo $row[0];
}

$userCheck = mysqli_num_rows($result);

if ($userCheck == 0){    // they don't have an accout, do something
    die('The username <b>'.$_POST['username'].'</b> does not exist in our database.
        <br/>
        <br/>
        If you think this is wrong <a href="login.html">try again</a>.
        <br/>
        <br/>
        Or <a href="SQLCreateAccount.php"> Click to create an account</a>');
}

// while($info = mysqli_fetch_array($check)){
    echo "Successfully logged in!<br/>";
    $_POST['username'] = stripslashes($_POST['username']);
    // setcookie("ThatCSGuide", $_POST['username'], false); //I have no idea what this does
    echo '<a href="index.html"> Click here to continue!</a>';
    // header("Location: index.html");
// }






// //Checks if there is a login cookie
// // if(isset($_COOKIE['ID_your_site'])){ //if there is, it logs you in and directes you to the members page
// //     $username = $_COOKIE['ID_your_site']; 
// //     $pass = $_COOKIE['Key_your_site'];
// //     $check = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

// //     // while($info = mysqli_fetch_array( $check )){
// //     //     if ($pass != $info['password']){}
// //     //     else{
// //     //         header("Location: login.php");
// //     //     }
// //     // }
// //  }


//  if the login form is submitted 
//  if (isset($_POST['submit'])) {

//     // makes sure they filled it in
//     if(!$_POST['username']){
//         die('You did not fill in a username.');
//     }
//     if(!$_POST['pass']){
//         die('You did not fill in a password.');
//     }

//     // checks it against the database
//     if (!get_magic_quotes_gpc()){
//         $_POST['email'] = addslashes($_POST['email']);
//     }

//     $check = mysqli_query($connect, "SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());

//  //Gives error if user dosen't exist
//  $check2 = mysqli_num_rows($check);
//  if ($check2 == 0){
//     die('That user does not exist in our database.<br /><br />If you think this is wrong <a href="login.php">try again</a>.');
// }

// while($info = mysqli_fetch_array( $check )){
//     $_POST['pass'] = stripslashes($_POST['pass']);
//     $info['password'] = stripslashes($info['password']);
//     $_POST['pass'] = md5($_POST['pass']);

//     //gives error if the password is wrong
//     if ($_POST['pass'] != $info['password']){
//         die('Incorrect password, please <a href="login.php">try again</a>.');
//     }
    
//     else{ // if login is ok then we add a cookie 
//         $_POST['username'] = stripslashes($_POST['username']); 
//         $hour = time() + 3600; 
//         setcookie(ID_your_site, $_POST['username'], $hour); 
//         setcookie(Key_your_site, $_POST['pass'], $hour);     
 
//         //then redirect them to the members area 
//         header("Location: members.php"); 
//     }
// }
// }
// else{
// //if they are not logged in 
?>


</body>
</html>