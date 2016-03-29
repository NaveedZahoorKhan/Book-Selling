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
        require_once './shelf.php';
        require_once './UserCard.php';
        require_once './logger.php';
        if ((isset($_COOKIE["id"]) and (isset($_COOKIE["uname"]))))
        {
            
            echo '<li><a href="">Welcome '.$_COOKIE["uname"].  '</a></li>'; 
            echo '<li><a href="">My User ID: '.$_COOKIE["id"].  '</a></li>'; 
            echo '<li><a href="">Email : '.$_COOKIE["email"].  '</a></li>'; 
            echo '<li><a href="Showcase.php" > Show Case </a> </li>' ;
            echo '<li><a href="logout.php"> Logout </a></li>';
            $row = new UserCard();
            $res = $row->getUser($_COOKIE["email"]);
            
           echo '<img src="'. $res["file"] . '" width="30%">';
           echo '<br>';
             $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
            if (!$conn) {
                die('Could not connect to MySQL: ' . mysqli_connect_error());
            }
            
            echo '<table>';
            echo '<tr>';
            echo '<th>My Books Catalogue</th>';
            echo '</tr>';
            $uid = $_COOKIE["id"];
            $result = mysqli_query($conn, 'SELECT * FROM user_books WHERE user_books.user_id = '."$uid" . '');
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
           
        }
        else
        if(!isset($_COOKIE["id"]))
            {
                       echo '<li><a href="login.php">Login</a></li>';
        }
        
        ?>
        
    </body>
</html>
