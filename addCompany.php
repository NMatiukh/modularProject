<?php
session_start();
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
session_start();
$userId = $_SESSION['userId'];
$database = new SQLite3('generalDatabase.sqlite');
//$database->exec("CREATE TABLE userCompany(id INTEGER PRIMARY KEY, name VARCHAR(255), address VARCHAR(255), serviceOfActivity VARCHAR(255), numberOfEmployees INTEGER, description VARCHAR(255), userId INTEGER)");

$database->exec("INSERT INTO userCompany(name, address, serviceOfActivity, numberOfEmployees, description, userId ) VALUES ('$name', '$address', '$serviceOfActivity', '$numberOfEmployees', '$description', '$userId')");

$text = "\n".date(DATE_RFC822)."-addCompany";
$fp = fopen("./logs_of_users/".$_SESSION["userId"].".log", "a");
fwrite($fp, $text);
fclose($fp);

header('Location: /index.php');
exit;