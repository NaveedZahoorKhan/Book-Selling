<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Login Here
        </title>
    </head>
    <body>
        <?php
            require_once './UserCard.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST" and (!isset($_COOKIE["id"]) and !isset($_COOKIE["name"])))
            {
                $logger = new UserCard();
                $login = $logger->login($_POST);
            }
            else
                if (isset($_COOKIE["id"]))
                {
                echo "Problem loging you in taking you to index";
                header("Location: index.php");
                }
        ?>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>"  method="POST">
            <input type="email" required="required" name="email">
            <br>
            <input type="password" required="required" name="password">
            <br>
            <input type="submit" value="Submit">
        </form>
        <br>
        <hr>
        
        <a href="CreateAccount.php">Sign Up</a>
    </body>
</html>
