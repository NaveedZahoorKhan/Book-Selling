<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './logger.php';
$conn = mysqli_connect('localhost', 'root', 'toor', 'book_reader', '3306');
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}
$id = $_POST["book_id"];
$name = $_POST["book_name"];
$category = $_POST["category"];
$author = $_POST["book_author"];
$publish= $_POST["book_publish"];
if (isset($_POST[""]))
{
$file = $_POST["front_page"];
$sql = "UPDATE book SET book_name = '$name' , book_author = '$author' , book_publish = '$publish', front_page = '$file' WHERE book_id = '$id'";
}
 else {
     $sql = "UPDATE book SET book_name = '$name' , book_author = '$author' , book_publish = '$publish' WHERE book_id = '$id'";
}
timewrite("Going to execute : ". $sql);
mysqli_query($conn, $sql);
$res = mysqli_affected_rows($conn);
timewrite("Rows affected : ". $res);
if ($res > 0 )
{
    echo 'Book Editied successfully';
    timewrite("Book Editited Success");
}
else
{
    echo 'Sorry ! something went wrong';
    timewrite("Error : ".mysqli_error($conn));
    echo mysqli_error($conn);
}
mysqli_close($conn);