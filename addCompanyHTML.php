<?php
session_start();
?>
    <div class="container">
        <div class="containerHeaderProfile">
            <span>Add company</span>
        </div>
        <div class="containerContent">
            <form action="addCompany.php" method="post">
                <label>
                    <p>Name*</p>
                    <input type="text" name="name" placeholder="Enter name" required>
                </label>
                <label>
                    <p>Address*</p>
                    <input type="text" name="address" placeholder="Enter address" required>
                </label>
                <label>
                    <p>Service of activity*</p>
                    <input type="text" name="serviceOfActivity" placeholder="Enter service of activity" required>
                </label>
                <label>
                    <p>Number of employees*</p>
                    <input type="number" name="numberOfEmployees" placeholder="Enter Number of employees" required>
                </label>
                <label>
                    <p>Description*</p>
                    <textarea style="resize: none" name="description" placeholder="Description" required></textarea>
                </label>
                <button name="submit">Add company</button>
            </form>
            <br>
            <a href="./index.php">
                <button class="generalButton" onclick="exiting(addCompany);">Exit</button>
            </a>
        </div>
        <div class="containerFooter"></div>
    </div>
