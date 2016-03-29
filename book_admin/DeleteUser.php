<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $email = $_POST["mail"];
                include_once './UserCard.php';
               $res = new UserCard();
               $rep = $res->deleteUser($email);
               echo $rep;
               echo '<br>';
               echo '<a href="home.php">Home</a>';
            }
        ?>
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?> ">
           Enter email of User:
            <input type="email" name="mail">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
