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
        require_once './UserCard.php';
        
            if ($_SERVER["REQUEST_METHOD"] == "POST" and !(isset($_COOKIE["id"]))) {
                
                $user = new UserCard();
                $dir = "uploads/";
                $target_file = $dir . basename($_FILES["file"]["name"]);
                move_uploaded_file($_FILES["file"]["tmp_name"] , $target_file);
                $reply = $user->createUser($_POST, $target_file);
                echo $reply;
                echo '<a href="index.php">Click here to return home </a>';
        }
        else if(isset($_COOKIE["id"])){
            echo 'Youre already logged in';
        }
        ?>
        <?php if (!isset($_COOKIE["id"]))
        {
            
?>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
            Username: <input type="text" name="name">
            <br>
            Email : <input type="email" name="email">
            <br>
            Password: <input type="password" name="password">
            <br>
            profilePhoto : 
            <input type="file" name="file">
            <br>
            <input type="submit"> 
        </form>
        <?php } ?>
    </body>
</html>
