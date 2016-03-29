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
            require_once './remBook.php';
           
            if ($_SERVER["REQUEST_METHOD"]=="POST")
            {
            $child = new remBook();
            $bookname = $_POST["bookname"];
            $res = $child->removeBook($bookname);
            }
            
           
        ?>
        <form action="<?php $_SERVER["PHP_SELF"]  ?>" method="post">
            Book Name : <input type="text" name="bookname">
            <input type="submit" value="Delete">
            
            
        </form>
    </body>
</html>
