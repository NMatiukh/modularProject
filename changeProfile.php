<?php
$email = $_GET['email'];
$password = $_GET['password'];
$last_name = $_GET['lastName'];
$first_name = $_GET['firstName'];
$phoneNumber = $_GET['phoneNumber'];
$description = $_GET['description'];

$error = '';
if (trim($first_name) == '')
    $error = 'Введіть ваше імя';
elseif (trim($last_name) == '')
    $error = 'Введіть ваше прізвище';
elseif (trim($email) == '')
    $error = 'Введіть ваше email';
elseif (trim($password) == '')
    $error = 'Введіть пароль';
elseif (trim($phoneNumber == ''))
    $error = 'Введіть ваш номер телефону';
elseif (trim($description) == '')
    $error = 'Введіть ваш коментар';

if ($error != '') {
    echo $error;
    exit();
}

$database = new SQLite3('generalDatabase.sqlite');
session_start();
$text = "\n".date(DATE_RFC822)."-changeProfile";
$fp = fopen("./logs_of_users/".$_SESSION["userId"].".log", "a");
fwrite($fp, $text);
fclose($fp);
$nowID = $_SESSION['userId'];
$database->query("UPDATE userMessage SET email = '$email', password = '$password', first_name = '$first_name', last_name = '$last_name', phoneNumber = '$phoneNumber', description = '$description' WHERE id = '$nowID';");

header('Location: /index.php');
exit;