<?php
session_start();
$database = new SQLite3('generalDatabase.sqlite');
$nowID = $_SESSION['userId'];
$userRow = $database->query("SELECT * FROM userMessage WHERE id = '$nowID';");
$email = '';
$password = '';
$last_name = '';
$first_name = '';
$phoneNumber = '';
$description = '';
$status = '';
while ($row = $userRow->fetchArray()) {
    $email = $row['email'];
    $password = $row['password'];
    $last_name = $row['last_name'];
    $first_name = $row['first_name'];
    $phoneNumber = $row['phoneNumber'];
    $description = $row['description'];
}
?>
<div class="container">
    <div class="containerHeaderProfile">
        <span>Profile</span>
    </div>
    <div class="containerContent">
        <form action="changeProfile.php" method="get" id="changeProfile">
            <label>
                <p>Email*</p>
                <input value="<?php echo $email ?>" type="email" name="email" placeholder="Enter email"
                       pattern=".+@langivi.technology+\.[a-z]{2,}$" required readonly>
                <p style="color: red" class="form__error">This field should contain an email in the format
                    example@langivi.technology.com</p>
            </label>
            <label>
                <p>Password*</p>
                <input value="<?php echo $password ?>" type="password" name="password" placeholder="Password" required
                       readonly>
            </label>
            <label>
                <p>Phone number*</p>
                <input value="<?php echo $phoneNumber ?>" type="text" name="phoneNumber" placeholder="Phone number"
                       pattern="^[\+]?[0-9]{3}[\s]?[\(]?\d+[\)]?[\s]?[-]?\d{3}[\s]?[-]?\d{2}[\s]?[-]?\d{2}"
                       required readonly>
                <p style="color: red" class="form__error">This field should contain a phone number in the format
                    +xxx (xx) xxx-xx-xx</p>
            </label>
            <label>
                <p>First name*</p>
                <input value="<?php echo $first_name ?>" type="text" name="firstName" placeholder="First name" required
                       readonly>
            </label>
            <label>
                <p>Last name*</p>
                <input value="<?php echo $last_name ?>" type="text" name="lastName" placeholder="Last name" required
                       readonly>
            </label>
            <label>
                <p>Description*</p>
                <textarea style="resize: none" name="description" placeholder="Description" required
                          readonly><?php echo $description ?></textarea>
            </label>
            <button class="display-none" name="submit" onclick="cancelChangeProfile()">Save</button>
        </form>
        <button id="editProfile" class="generalButton" onclick="changeProfile()">Edit</button>
        <br>
        <a href="./index.php">
            <button class="generalButton" onclick="exiting(profile); cancelChangeProfile()">Exit</button>
        </a>
    </div>
    <div class="containerFooter"></div>
</div>
