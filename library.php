<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface  library
{
public function addBook();
public function removeBook($bookname);
public function getBook($book);
public function setBook($bookdata, $bookfile);
}