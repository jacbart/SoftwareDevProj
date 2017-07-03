<?php
$past = time() - 100;
setcookie(ThatCSGuide,gone,$past);
header("Location: index.html");
?>