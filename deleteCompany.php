<?php
$id = $_POST['id'];
$database = new SQLite3('generalDatabase.sqlite');
$database->query("DELETE FROM userCompany WHERE id ='$id';");

session_start();
$text = "\n".date(DATE_RFC822)."-deleteCompany";
$fp = fopen("./logs_of_users/".$_SESSION["userId"].".log", "a");
fwrite($fp, $text);
fclose($fp);
header('Location: ./index.php');
exit();