<?php

$database = new SQLite3('generalDatabase.sqlite');

$email = $_POST['email'];
$password = $_POST['password'];

$query = $database->query("SELECT id, password FROM userMessage WHERE email = '$email';");
$data = $query->fetchArray();
if ($data['password']===$password){

//    setcookie("id", $data['id'], time()+60*60*24*30, "/");
    session_start();
    $_SESSION["userId"]=$data['id'];
    $text = "\n".date(DATE_RFC822)."-signIn";
    $fp = fopen("./logs_of_users/".$_SESSION["userId"].".log", "a");
    fwrite($fp, $text);
    fclose($fp);
    header("Location: index.php"); exit();
}
else
{
    print "Вы ввели неправильный логин/пароль";
}

