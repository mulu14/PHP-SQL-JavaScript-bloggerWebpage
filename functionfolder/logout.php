<?php
session_start(); // session start 
if(!isset($_SESSION['username'])){ // if the session varible is not set
                                  // redirect to index page 
    header('location:../index.php'); 
}
unset($_SESSION['username']); // unset session variable name 
session_destroy(); // destroy session 
header('location:../index.php'); // direct the page to index page 

?>


