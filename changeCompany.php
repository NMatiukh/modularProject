<?php
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$serviceOfActivity = $_POST['serviceOfActivity'];
$numberOfEmployees = $_POST['numberOfEmployees'];
$description = $_POST['description'];
$error = '';
if (trim($name) == '')
    $error = 'Введіть ваше імя';
elseif (trim($address) == '')
    $error = 'Введіть ваш адрес';
elseif (trim($serviceOfActivity) == '')
    $error = 'Введіть вашу діяльність';
elseif (trim($numberOfEmployees) == '')
    $error = 'Введіть кількість працівників';
elseif (trim($description) == '')
    $error = 'Введіть ваш коментар';

if ($error != '') {
    echo $error;
    exit();
}

$database = new SQLite3('generalDatabase.sqlite');

$database->query("UPDATE userCompany SET name = '$name', address = '$address', serviceOfActivity = '$serviceOfActivity', numberOfEmployees = '$numberOfEmployees', description='$description' WHERE id = '$id';");
session_start();
$text = "\n".date(DATE_RFC822)."-changeCompany";
$fp = fopen("./logs_of_users/".$_SESSION["userId"].".log", "a");
fwrite($fp, $text);
fclose($fp);
header('Location: ./index.php');
exit();