<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function filehandle()
    {
        $myfile = fopen("log.txt", "a") or die("unable to open file ");
        return $myfile;
    }
    function timewrite($msg)
    {
        $f  = filehandle();
        date_default_timezone_set("Asia/Karachi");
        
        
        $sec = idate("s");
        $min = idate("i");
        $hour = idate("h");
        fwrite($f, $hour . "-\t" . $min . "-\t" . $sec. "-\t" . $msg . PHP_EOL);
    }