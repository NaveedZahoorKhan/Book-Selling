<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require './library.php';
require './logger.php';
class bookShelf implements library
{
    public function addBook()
    {
        
    }
    public function getBook($book)
    {
       
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
        if (!$conn) 
            {
        
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        
        
        $sql = "SELECT * FROM book WHERE book.book_name like '%$book%'";
        
        $result = mysqli_query($conn, $sql);
       
        mysqli_error($conn);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_error($conn);
        return $row;
        mysqli_free_result($result);
       
// TODO: insert your code here.
        mysqli_close($conn);
    }

    public function removeBook($book) 
    {
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        $sql = "DELETE FROM `book` WHERE book_name = '$book'";

        timewrite("Going to execute from remove book : ".$sql);
        
        mysqli_query($conn, $sql);
        $res = mysqli_affected_rows($conn);
        timewrite("My SQLi effected Rows are : ".$res);
        
// TODO: insert your code here.
        mysqli_close($conn);
        return $res;
    }

    public function setBook($bookdata, $filename)
    {
        $conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        $book_name = $bookdata["name"];
        $book_author = $bookdata["author"];
        $book_category = $bookdata["category"];
        $book_publish  = $bookdata["year"];
        $book_front = $filename;
        $sql = "INSERT INTO `book_reader`.`book` ( `book_name`, `book_author`, `book_publish`, `category`, `front_page`) VALUES ('$book_name', '$book_author', '$book_publish', '$book_category', '$book_front');";
        timewrite("Going to execute: ". $sql);
        mysqli_query($conn, $sql);
        $res = mysqli_affected_rows($conn);
        
// TODO: insert your code here.
        mysqli_close($conn);
        return $res;
    }

}
