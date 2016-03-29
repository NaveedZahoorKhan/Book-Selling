<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Display</title>
    </head>
    <body>
        <?php
        require_once './logger.php';
               $q = $_GET["q"];
              
               $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
               if (!$conn) {
                   die('Could not connect to MySQL: ' . mysqli_connect_error());
               }
               $sql = 'SELECT * FROM book WHERE book_name = "'."$q" . '"';
               
               $sql2 = 'SELECT * FROM user_books WHERE book_id = "'."$q" . '"';
               timewrite("Going to execute : ". $sql);
               $res = mysqli_query($conn, $sql);
               $row = mysqli_fetch_array($res);
               if ($row == NULL)
                   timewrite ("mysql : error : ".mysqli_error ($conn));
              
               
               echo '<img style="float:left" width = "30%" src=" '.$row["front_page"] . '" >';
               echo '<div style="margin-left:30%">';
               echo '<h1>' . $q . '<h1>';
               echo '<br>';
               echo '<h3> Author: ' .$row["book_author"] .'</h3>';
               echo '<br>';
               echo '<h3> Book ID: ' .$row["book_id"] .'</h3>';
               echo '<br>';
               echo '<h3> Publishing Year : '. $row["book_publish"] .'';
               echo '<br>';
               echo '<h3> Category : '. $row["category"] .'';
               
               echo '</div>';
               echo 'Actions: ';
               
               $sql2 = 'SELECT * FROM user_books WHERE book_id = "'.$row['book_id'] . '" ';
               timewrite("Going to execute ffrom book display: ". $sql2);
               $res2 = mysqli_query($conn, $sql2);
               $row2 = mysqli_fetch_array($res2);
               
               if ($row2 <= 0)
               {
               echo '<a href="addToCollection.php?q='.$row['book_id'] . ' && status=Still Reading">Add to still reading</a>';
               echo '<br>';
               echo '<a href="addToCollection.php?q='.$row['book_id'] . ' && status=Complete Reading">Add to Previously Read</a>';
               }
                else
                    {
                   echo '<br>';
                   echo 'Book is in '.$row2["status"];
                   echo '<br>';
                   echo 'Book Rating : '.$row2["rating"];
                   
                    }
                    
                    echo '<br>';
                    echo 'Comments :';
                   $sql3 = "Select * FROM user_books WHERE book_id = ". $row["book_id"] . " and comment != 'NULL'";
                   $res3 = mysqli_query($conn, $sql3);
                   timewrite("Going to execute from bookdisplay".$sql3);
                   
                   echo '<br>';
                  while (($row3 = mysqli_fetch_array($res3, MYSQLI_ASSOC)) != NULL)
                  {
                   
                      $sql4 = "Select * FROM users WHERE id = ". $row3["user_id"] ."";
                      timewrite("Going to execute from bookdisplay : ".$sql4);
                      
                   $res4 = mysqli_query($conn, $sql4);
                   $row4 = mysqli_fetch_array($res4);
                   echo mysqli_error($conn);
                   echo '<a href="profiledisplay.php?u='.$row4["id"] .'">  '. $row4["name"] . " :  </a>";
                      echo $row3["comment"];
                      echo '<br>';
                  }
                  if($_SERVER["REQUEST_METHOD"] == "POST")
                  {
                      $sql5 = "UPDATE user_books SET comment = '".$_POST['texty'] . "' where book_id = " . $row["book_id"] . " and user_id = " . $_COOKIE["id"] . "";
                      timewrite("from bookdisplay ". $sql5);
                      
                      mysqli_query($conn, $sql5);
                      timewrite("Rows Effected : ". mysqli_affected_rows($conn));
                      timewrite(mysqli_error($conn));
                  }
               mysqli_close($conn);
        ?>
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>" >
            Your Comment:
            <br>
            <textarea name="texty"></textarea>
            <br>
            <input type="submit">
            
        </form>
    </body>
</html>