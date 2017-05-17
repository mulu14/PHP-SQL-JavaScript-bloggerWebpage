<?php
include 'connect.php';
session_start(); 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/project.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="" type="text/css" />
        <script src="../javscript/login.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
        <div class="header">
        <div class="classone">
          
            <div class="signin">
                <ul
                    <li><a href="signIn.php" id="register">Sign in</a> </li>  
                </ul>
            </div>
            <div class="logo">
             <img src="../image/blogger.jpg"  alt="logo" >    
           </div>
        </div>
        <div class="classtwo">
            <nav>
             <ul>
               <li><a href="../index.php"> Home </a> </li>
               <li><a href="../otherFile/design.php">News</a> </li>
               <li><a href="../otherFile/service.php">Service </a> </li>
               <li><a href="../otherFile/marketing.php">Marketing</a> </li>
               <li><a href="../otherFile/product.php">Product</a> </li>
               <li><a href="../otherFile/blogg.php">Post blogg</a> </li>
            </ul>
        </nav>
        </div>
        <div class="classthree">
            <div class="login" id="Login">
                <a href="login.php" id="sigIn"><span class="fa fa-unlock-alt"></span>Login</a>
                <a href="logout.php" id="sinOut"><span class="fa fa-sign-out"></span>Sign out</a>
           </div>
          
           
        </div>
        </div>
        <section class="body">
            <div class="left">
               
                <form action="signIn.php" method="post" class="form">
                    <label> Name </label>
                    <input type="text" name="name"><br>
                    <label> Last Name  </label>
                    <input type="text" name="lastname"><br>
                    <label> Email  </label>
                    <input type="email" name="email"><br>
                    <label> User Name  </label>
                    <input type="text" name="username"><br>
                    <label> Pass word  </label>
                    <input type="password" name="password"><br>
                    <label> Confirm password  </label>
                    <input type="password" name="cpassword"><br>
                    <input type="submit"  name="register">
                    </form>
            </div> 
            
            <div class="middel">
               
                
                
                    
<?php 
if(isset($_POST['register'])){
     $name = $mysqli->real_escape_string($_POST['name']);
     $lastname = $mysqli->real_escape_string($_POST['lastname']); 
     $email= $mysqli->real_escape_string($_POST['email']); 
     $username= $mysqli->real_escape_string($_POST['username']); 
     $password = $mysqli->real_escape_string($_POST['password']);
     $cpassword = $mysqli->real_escape_string($_POST['cpassword']);
     $query = $mysqli->query("SELECT * FROM profile where email= '$email'") or die($mysqli ->error());
     $query2 = $mysqli->query("SELECT * FROM profile where username= '$username'") or die($mysqli ->error());
     
     if(empty($username) OR empty($lastname) OR empty($username) OR empty($password) OR empty($cpassword)){
         echo  'Fields are required';
     }
    else if($query ->num_rows > 0){
        echo 'user is already existed';
     }
    else if($password !== $cpassword){
        echo 'Your pass word does not Match'; 
        
    }
 else if(strlen($password) < 6) {
        echo 'Your password must be atlest 5 charcters'; 
 }
 else if($query2 ->num_rows > 0){
     echo 'The username is already taken'; 
 }
 else{
     $password = md5($password);
     $insert = $mysqli ->query("INSERT INTO profile(firstName, lastName, email, username, password)
             VALUES('$name', '$lastname', '$email', '$username', '$password')");
     if($insert !=TRUE){
         echo 'There was a problem' ;
         echo '</br>';
         echo  $mysqli -> error; 
     }
     else{
         echo 'You have been registerd';
        $createPage = fopen("../listOfblogger/$name.php", 'w') or die('Unable to open file!'); // create a new page for every new user
        $templete = file_get_contents("../createpage/page.php"); //get the template file; 
        fwrite($createPage, $templete); // write content on template file 
        header('location:../index.php'); // locate a page to header after completing the signin process 
         
     }
 }
}
   ?>
         </div>
            <div class="right">
              
            </div>
            
        </section>
        </div>
    </body>
</html>










