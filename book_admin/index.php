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
        include_once '../logger.php';
        
        if($_SERVER["REQUEST_METHOD"] == "POST" and !isset($_COOKIE["cemail"]))
        {
            $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
            if (!$conn) 
            {
                die('Could not connect to MySQL: ' . mysqli_connect_error());
            }
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $sql = "SELECT * FROM `admin` WHERE email = '".  $email. "' AND password = '".$password. "'";
            
            timewrite("Going to execute : ".$sql);
            echo $sql;
            $result = mysqli_query($conn, $sql);
            echo mysqli_error($conn);
            echo '<br>';
            $row = mysqli_fetch_array($result);
            echo mysqli_error($conn);
            echo '<br>';
            var_dump($row);
            echo '<br>';
            if ($row > 0)
            {
                timewrite("MySQLi rows are greater than 0 ");
                echo 'Login Successfull';
                $email = $_POST["email"];
                $name = $_POST["name"];
              
                setcookie("cuser", "Admin");
                setcookie("cname", $name);
                setcookie("cemail",$email);
                header("Location: home.php");
            }
            else
                
            {
                echo 'Login Unsuccessfull';
                echo mysqli_error($conn);
            }
            
// TODO: insert your code here.
            mysqli_close($conn);
        }
            else 
            if((isset ($_COOKIE["cemail"]) ) and (isset ($_COOKIE["cuser"]) and isset ($_COOKIE["email"])))
            {
                header("Location: home.php");
            }
            
                
            
        ?>
        <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" >
            Email: <input type="text" name="email">
            Password : <input type="password" name="password" > 
            <input type="submit">
        
        </form>
    </body>
</html>
