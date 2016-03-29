<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Reader</title>
    </head>
    <body>
        <?php
                $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
                if (!$conn) {
                    die('Could not connect to MySQL: ' . mysqli_connect_error());
                }
                $u = $_GET["u"];
                $sql = "SELECT * FROM users WHERE id = $u";
                include_once './logger.php';
                timewrite("Going to execute from profiledisplay : ".$sql);
                
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);
                echo '<a href="index.php">Home</a>';
                echo '<br>';
                echo '<img src="'. $row["file"].'" width=10%> ';
                echo '<h3>'. $row["name"] . '</h3>';
                echo '<h3>'. $row["email"] . '</h3>';
                echo '<h3> Book Liked by User :</h3>';
                echo '<table>';
            echo '<tr>';
            echo '<th>Books Liked By User </th>';
            echo '</tr>';
           
            $result = mysqli_query($conn, 'SELECT * FROM user_books WHERE user_books.user_id = '."$u" . ' and status = "Still Reading" or status = "Comple Reading"');
            timewrite("From profiledisplay :". 'SELECT * FROM user_books WHERE user_books.user_id = '."$u" . ' and status != NULL');
            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                
                $sql2 = "Select * from book WHERE book_id  = '".$row['book_id'] . "'";
                $result2 = mysqli_query($conn, $sql2);
                timewrite("Going to execute : ". $sql2);
                
                
                while (($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) != NULL)
                {
                    echo '<td> <span> <img width="30%"  src = "' .$row2["front_page"]. '" > '
                            . '<br><a href="BookDisplay.php?q='.$row2["book_name"] .'">' . $row2["book_name"] . '</a>'
                            . '</span>  </td>';
                }
                
            }
            mysqli_free_result($result);
           
            echo '</table>';
                mysqli_close($conn);
        ?>
    </body>
</html>
