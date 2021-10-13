<?php
session_start();
date_default_timezone_set('UTC');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>ModularProject</title>
</head>
<body>


<header>
    <div style="font-size: 20px">
        <img class="headerIcon" src="./img/icon.png" alt="icon.png">
        Modular Project
    </div>
    <div>
        <span <?php if ($_SESSION["userId"]) echo 'onclick="showWindow(addCompany)"' ?>  class="textButton" >Add company</span>

    </div>
    <div class="textButton">
        <img class="profile_icon" src="./img/profile_icon.png" alt="profile_icon.png">
        <span <?php if ($_SESSION["userId"]) echo 'onclick="showWindow(profile)"' ?>>Profile</span>
    </div>
    <div <?php if ($_SESSION["userId"]) echo 'style="display: none"' ?> style="width: 11%">
        <button onclick="showSignIn()">Sign in</button>
        <button onclick="showSignUp()">Sign up</button>
    </div>
    <div <?php if (!$_SESSION["userId"]) echo 'style="display: none"' ?>>
        <a href="./logout.php">
            <button>logout</button>
        </a>
    </div>
</header>
<div>
    <div id="signs">
        <div id="containerSignIn" class="container">
            <div class="containerHeader">
                <div>
                    <p>Welcome!</p>
                    <br>
                    <p>Sign in to continue</p>
                </div>
                <img src="./img/Image_container.png" alt="Image_container.png">
            </div>
            <div class="containerContent">
                <form action="/signIn.php" method="post">
                    <label>
                        <p>Email</p>
                        <input name="email" type="email" placeholder="Enter email" required>
                    </label>
                    <label>
                        <p>Password</p>
                        <input name="password" type="password" placeholder="Enter password"
                               required>
                    </label>
                    <button name="submit">Log in</button>
                </form>
            </div>
            <div class="containerFooter">
                <p>Don’t have an account? <span onclick="showSignUp()" class="textButton"
                                                id="signUpButton">Sign up now</span></p>
            </div>
        </div>
        <div class="container" id="containerSignUp">
            <div class="containerHeader">
                <div>
                    <p>Sign up</p>
                    <br>
                    <p>* field is required</p>
                </div>
                <img src="./img/Image_container.png" alt="Image_container.png">
            </div>
            <div class="containerContent">
                <form action="signUp.php" method="post">
                    <label>
                        <p>Email*</p>
                        <input type="email" name="email" placeholder="Enter email"
                               pattern=".+@langivi.technology+\.[a-z]{2,}$" required>
                        <p style="color: red" class="form__error">This field should contain an email in the format
                            example@langivi.technology.com</p>
                    </label>
                    <label>
                        <p>Password*</p>
                        <input type="password" name="password" placeholder="Password" required>
                    </label>
                    <label>
                        <p>Phone number*</p>
                        <input type="text" name="phoneNumber" placeholder="Phone number"
                               pattern="^[\+]?[0-9]{3}[\s]?[\(]?\d+[\)]?[\s]?[-]?\d{3}[\s]?[-]?\d{2}[\s]?[-]?\d{2}"
                               required>
                        <p style="color: red" class="form__error">This field should contain a phone number in the format
                            +xxx (xx) xxx-xx-xx</p>
                    </label>
                    <label>
                        <p>First name*</p>
                        <input type="text" name="firstName" placeholder="First name" required>
                    </label>
                    <label>
                        <p>Last name*</p>
                        <input type="text" name="lastName" placeholder="Last name" required>
                    </label>
                    <label>
                        <p>Description*</p>
                        <textarea style="resize: none" name="description" placeholder="Description" required></textarea>
                    </label>
                    <button name="submit">Sign up</button>
                </form>
            </div>
            <div class="containerFooter">
                <p>Do you have account? <span onclick="showSignIn()" class="textButton">Sign in now</span></p>
            </div>
        </div>
    </div>
    <div id="profile">
        <?php
        include("./profile.php");
        ?>
    </div>
    <div id="addCompany">
        <?php
        include("./addCompanyHTML.php");
        ?>
    </div>
    <div id="myCompanies" <?php if (!$_SESSION["userId"]) echo 'style="display: none"' ?>>
        <?php
        include("./myCompanies.php");
        ?>
    </div>
    <div id="company">
        <?php
        include("./company.php");
        ?>
    </div>
</div>
<footer>
    <?php
    $userID = $_SESSION["userId"];
    if ($_SESSION["userId"]) {
        echo "<span>ID this user is: $userID</span>";
    }else{
        echo "<span style='font-size: small'>please sigIn or signUp for further action...</span>";
    }
    ?>
</footer>

</body>
<script src="script.js"></script>
</html>
