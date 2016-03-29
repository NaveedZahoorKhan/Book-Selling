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
       require_once './shelf.php';
                if ($_SERVER["REQUEST_METHOD"]== "POST")
                {
                    var_dump($_FILES);
                    echo '<br>';
                    
                    $dir = "books_upload/";
                    $target_file = $dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"] , $target_file);
                    $addBook = new bookShelf();
                    $reply = $addBook->setBook($_POST, $target_file);
                    
                   
                    if ($reply > 0)
                    {
                        echo 'Successfully Added new Book ';
                        echo '<a href="index.php">Home</a>';
                    }
 else {
                        echo 'Unable to add Book';
 }
                }
        ?>
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
            Name of Book: <input type="text" name="name" required="required">
            <br>
            Name of Author: <input type="text" name="author">
            <br>
            Publish year : <input type="year" name="year" type="number">
            <br>
            Book Category : <input type="text" name="category">
            
            <br>
            Cover Photo : <input type="file" name="file">
            <br>
            <input type="submit">
        </form>
    </body>
</html>
