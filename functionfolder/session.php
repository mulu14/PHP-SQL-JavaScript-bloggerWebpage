<?php
session_start(); 
    if(isset($_SESSION['username'])){
     $userId = $_SESSION['username']; 
     $return_date = array(); 
     $return_data['user'] = $userId; 
     echo json_encode($return_data); 
     exit(); 
    }            
   ?>  

