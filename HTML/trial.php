<!DOCTYPE html>
<html>
<head>
    <title>trial for cookies</title>
</head>
<body>

<?php

if (isset($_COOKIE['ThatCSGuide'])){
    echo "Hello ".$_COOKIE['ThatCSGuide']." how are you?";
    echo '<a href="logout.php">
        <button type="button" class="btn btn-default pull-right" 
        aria-haspopup="true" aria-expanded="false">
            Log Out
        </a></button>';
    echo '<br><br>
    <a href="../JS/hello.html">
    <button type="button" class="btn btn-default pull-right" 
    aria-haspopup="true" aria-expanded="false">
        this sucks
    </a></button>';
}
else{
    echo '<a href="login.html">
        <button type="button" class="btn btn-default pull-right" 
        aria-haspopup="true" aria-expanded="false">
            Log In
        </button>';
}

?>

<?php

echo $_COOKIE['ThatCSGuide']

?>

</body>
</html>