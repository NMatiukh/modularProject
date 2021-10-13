<?php
session_start();
$database = new SQLite3('generalDatabase.sqlite');
$nowID = $_SESSION['userId'];
$userRows = $database->query("SELECT id FROM userCompany WHERE userId = '$nowID';");
$id = [];
while ($row = $userRows->fetchArray()) {
    $id[] = $row['id'];
}
?>


<ol>
    <?php
    for ($i = 0; $i < count($id); $i++) {
        $userRow = $database->query("SELECT * FROM userCompany WHERE id = '$id[$i]';");
        $name = '';
        while ($row = $userRow->fetchArray()) {
            $name = $row['name'];
        }
        echo "<li onclick='show(id); showWindow(company)' id='company$id[$i]' style='cursor: pointer'>$name</li>";
    }
    ?>
</ol>

