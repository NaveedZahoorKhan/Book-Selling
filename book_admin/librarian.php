<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './shelf.php';
class librarian extends bookShelf
{
  
    
    
}
$init = new librarian();
$booker = $init->getBook("A");
var_dump($booker);