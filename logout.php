

<?php 
include_once './logger.php';
foreach($_COOKIE as $key => $value)
{

    setcookie($key , $value, time()-10000);
}
                   
echo "Youre logged out";
timewrite("Destroyed all cookies");

myredirect();
function myredirect()
{
    header("Location: index.php");
}


