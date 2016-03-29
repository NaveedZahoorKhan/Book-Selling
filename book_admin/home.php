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
        
                echo '<h1>Welcome to Admin Panel</h1>';
                echo '<br><br>';
                echo 'Current User: '. $_COOKIE["cuser"];
                echo '<br>';
                echo 'Current Email:'. $_COOKIE["cemail"];
                echo '<br><br>';
                echo 'Admin Actions: ';
                echo '<ul>';
                echo '<li><a href="../addBook.php">Add Book </a></li>';
                echo '<li><a href="bookremover.php">Remove Book </a></li>';
                echo '<li><a href="bookedit.php">Edit Book</a></li>';
                echo '</ul>';
                echo '<h3>Users : </h3>';
                echo '<ul>';
                echo '<li><a href="../CreateAccount.php">Add User: </a></li>';
                echo '<li><a href="DeleteUser.php">Delete User</a>';
        ?>
    </body>
</html>
