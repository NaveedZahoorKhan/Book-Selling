<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserCard
 *
 * @author Rebbel
 */
require_once './USERInterface.php';
require_once './logger.php';
class UserCard implements USERInterface
{
    public function createUser($userdata, $file) 
    {
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
        if (!$conn) 
        {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        $username = $userdata["name"];
        $password = $userdata["password"];
        $email = $userdata["email"];
        $filepath = $file;
        $sql = "INSERT INTO `book_reader`.`users` ( `name`, `email`, `password`, `file`) VALUES ( '$username', '$email', '$password', '$filepath');";
        
        timewrite("Going to execute : " . $sql);
        
        $res = mysqli_query($conn, $sql);
        $num = mysqli_affected_rows($conn);
        timewrite("$num Rows Affected");
        mysqli_close($conn);
        if ($num > 0 )
        {
            return "User Created successfully";
        }
 else {
            return "Error in creating USER";
 }
    }

    public function deleteUser($email) 
    {
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        $sql = "Delete FROM users WHERE email = '$email'";
        mysqli_query($conn, $sql);
        $num= mysqli_affected_rows($conn);
        timewrite("Row affected in deletion : ".$num);
       
          
// TODO: insert your code here.
        mysqli_close($conn);
        if ($num > 0 )
        {
            return "Success";
        }
 else {
            return "Failed in deleting user";
 }
    }

    public function getUser($UserName) {
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
        if (!$conn)
        {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        $sql = "SELECT * FROM users WHERE email = '$UserName'";
        timewrite("Going to execute: $sql");
        $res = mysqli_query($conn, $sql);
        timewrite("MySQLI Returned : ". mysqli_error($conn));
        $row = mysqli_fetch_array($res);
        

        mysqli_free_result($res);
        mysqli_close($conn);
      
            return $row;
        
        }

    public function setUser() 
    {
        
    }

    public function login($logindata)
    {
        $email = $logindata["email"];
        $password = $logindata["password"];
        $row = UserCard::getUser($email);
        if ($row["password"]==$password)
        {
            timewrite("Going to login");
                UserCard::sessionManager($row);
        }
        else 
            {
            timewrite("Username or password incorrect");
            }
// TODO: insert your code here.
    
    }

    public function sessionManager($row) {
        if (isset($_COOKIE["uname"]) and isset($_COOKIE["email"]))
        {
            timewrite("Session is already in progress");
            header("Location: index.php");
        }
        else 
            {
            timewrite("Going to start a new session");
            setcookie("uname",$row["name"]);
            setcookie("id",$row["id"]);
            setcookie("email",$row["email"]);  
            timewrite("Cookies all set");
            header("Location: index.php");
            }
            
    }

    public function getBooks($userid)
    {
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
        if (!$conn) 
        {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
       
        mysqli_query($conn, 'SET NAMES \'utf8\'');
// TODO: insert your code here.
        mysqli_close($conn);
    }

//put your code here
}
