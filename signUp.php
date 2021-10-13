<?php


$email = $_POST['email'];
$password = $_POST['password'];
$last_name = $_POST['lastName'];
$first_name = $_POST['firstName'];
$phoneNumber = $_POST['phoneNumber'];
$description = $_POST["description"];

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

$subject = "Заявка від користувача";
$headers = "Імя користувача: $first_name $last_name\r\nНомер телефону користувача: $phoneNumber\r\nКоментар: $description\r\nContent-type: VARCHAR(255)/html;charset=utf-8\r\n";
mail('nazarii.matiukh@gmail.com', $subject, $headers);

$database = new SQLite3('generalDatabase.sqlite');
//$database->exec("CREATE TABLE userMessage(id INTEGER PRIMARY KEY, email VARCHAR(255), password VARCHAR(255), first_name VARCHAR(255), last_name VARCHAR(255), phoneNumber VARCHAR(255), description VARCHAR(255))");
$database->exec("INSERT INTO userMessage(email, password, first_name, last_name, phoneNumber, description) VALUES ('$email', '$password', '$first_name', '$last_name', '$phoneNumber', '$description')");
$query = $database->query("SELECT id FROM userMessage WHERE email = '$email';");
$data = $query->fetchArray();
//setcookie("id", $data['id'], time()+60*60*24*30, "/");
session_start();
$_SESSION["userId"]=$data['id'];
$text = "\n".date(DATE_RFC822)."-signUp";
$fp = fopen("./logs_of_users/".$_SESSION["userId"].".log", "a");
fwrite($fp, $text);
fclose($fp);
header('Location: /index.php');
exit;
