<?php

session_start(); 
?>           
  <?php
  function deleteBlog(){
    include 'connect.php';
    if(isset($_GET['id'])){
    $blogId = $_GET['id'];
    $query = $mysqli->query("DELETE FROM blogg where bloggId='$blogId'"); 
    if($query == TRUE){
        $_SESSION['sucess'] = 'Blogg deleted successfully';
       header('Location:sucess.php'); 
    }
    else{
        $_SESSION['error'] = $mysqli -> error; 
         header('Location:error.php'); 
    } 
    }  
  }
  
  deleteBlog(); 
  
  function deleteImage(){
    include 'connect.php';
    if(isset($_GET['id'])){
    $imageId = $_GET['id'];
    $query = $mysqli->query("DELETE FROM image where imageId='$imageId'"); 
    if($query == TRUE){
        $_SESSION['sucess'] = 'Image deleted successfully';
       header('Location:sucess.php'); 
    }
    else{
        $_SESSION['error'] = $mysqli -> error; 
         header('Location:error.php'); 
    } 
    }  
  }
  
  deleteImage();
  
  ?>