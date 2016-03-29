<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of remBook
 *
 * @author Rebbel
 */
include_once '../shelf.php';
class remBook extends bookShelf{
    //put your code here
    public function removeBook($bookname) {
        $reply = parent::removeBook($bookname);
        if ($reply > 0)
        {
            echo 'Successfully Deleted Book ';
            timewrite("Book Deletion Complete");
        }
        else 
            {
            echo 'Unable to delete Book';
            timewrite("Unable to delete book");
            }
    }
}
    