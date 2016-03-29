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
        require_once './logger.php';
            $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
            if (!$conn) {
                die('Could not connect to MySQL: ' . mysqli_connect_error());
            }
            echo '<a href="index.php" > Home </a>';
            
            echo '<table>';
            echo '<tr>';
            echo '<th>category</th>';
            echo '</tr>';
            $result = mysqli_query($conn, 'SELECT distinct category FROM book');
            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                
                echo '<tr>';
                echo '<th>' . $row['category'] . '</th>';
                echo '<tr>';
                $sql2 = "Select * from book WHERE category = '".$row['category'] . "'";
                $result2 = mysqli_query($conn, $sql2);
                timewrite("Going to execute : ". $sql2);
                while (($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) != NULL)
                {
                    echo '<td> <div> <img width="30%"  src = "' .$row2["front_page"]. '" > '
                            . '<br><a href="BookDisplay.php?q='.$row2["book_name"] .'">' . $row2["book_name"] . '</a>'
                            . '</div>  </td>';
                }
                echo '</tr>';
                echo '</tr>';
            }
            mysqli_free_result($result);
            echo '</table>';
           
            mysqli_close($conn);
        ?>
    </body>
</html>
