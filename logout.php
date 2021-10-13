<?php
//setcookie("id", "", time() - 3600*24*30*12, "/");
ini_set('session.gc_maxlifetime', 7200);
ini_set('session.cookie_lifetime', 7200);
session_start();
$text = "\n".date(DATE_RFC822)."-logout";
$fp = fopen("./logs_of_users/".$_SESSION["userId"].".log", "a");
fwrite($fp, $text);
fclose($fp);


unset($_SESSION["userId"]);
echo $_SESSION["userId"];
header("Location: ./index.php"); exit;