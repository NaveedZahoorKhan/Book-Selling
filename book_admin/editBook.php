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
        if (isset($_POST["bookname"]))
        {
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
         if (!$conn) {
             die('Could not connect to MySQL: ' . mysqli_connect_error());
         }
         $bookname = $_POST["bookname"];
         $sql = "SELECT * FROM book where book_name = '$bookname'";
         
         $res = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($res);
         
         timewrite("Going to execute from editbook ". $sql);
        
        ?>
        <form method="post" action="finalEdit.php" enctype="multipart/form-data">
            <span style="width: 30px"><img src="../<?= $row["front_page"] ?> " width="30%" >
            </span>
            <span style="width: 50%">
                <br><br>
                <input type="hidden" name="book_id" value="<?= $row["book_id"] ?>" required="">
                <input type="text" name="book_name" value="<?= $row["book_name"] ?>" required="">
            <br><br>
            
            <input type="text" name="book_author" value="<?= $row["book_author"] ?>" required="">
            <br><br>
            <input type="number" name="book_publish" value="<?= $row["book_publish"] ?>" required="">
            <br><br>
            <input type="text" name="category" value="<?= $row["category"] ?>" required="">
            <br><br>
            <input type="file" name="file" value="<?= $row["font_page"] ?>">
            <br><br>
            <input type="submit">
        </span>
        </form>
        
        <?php
         // TODO: insert your code here.
         mysqli_close($conn);
        }
        ?>
        
    </body>
</html>
