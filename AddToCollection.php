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
        include_once './logger.php';
            $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
            if (!$conn) {
                die('Could not connect to MySQL: ' . mysqli_connect_error());
            }
            echo '<a href="index.php" > Home </a>';
            $uid = $_COOKIE["id"];
            $bookid = $_GET["q"];
            $status = $_GET["status"];
            timewrite("Values Received : ". $status . $bookid );
            $sql = "INSERT INTO user_books(user_id,book_id ,status) VALUES ('$uid','$bookid','$status')" ;
            timewrite($sql);
            $result = mysqli_query($conn, $sql);
            $num = mysqli_affected_rows($conn);
            timewrite("Rows affected :" . $num);
            if ($num > 0)
            {
                echo 'Book has been added to your collection';
                echo '<br>';
                echo '<a href="Showcase.php">Click here to return to show case </a>';
            }
// TODO: insert your code here.
            mysqli_close($conn);
        ?>
    </body>
</html>
