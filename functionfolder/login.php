
<?php 
include 'connect.php';
session_start(); 
?>
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
        <div class="body">
            <div class="classlogin">
            <div class="loginform" id="loginform">
               <form action="login.php" method="post" class="form">
                    <label> User Name  </label>
                    <input type="text" name="username"><br>
                    <label> Pass word  </label>
                    <input type="password"  name="password"><br>
                    <input type="submit"  name="login" id="submit">
             </form> 
           </div>
            </div>
            
            <div class="right">
                

<?php
if(isset($_POST['login'])){
$username =  $mysqli->real_escape_string($_POST['username']);
$password = $mysqli->real_escape_string($_POST['password']);

if(empty($username) OR empty($password)){
    $_SESSION['error'] = "The fields are required";
    header('location:error.php');
}

else{

  $q = $mysqli->query("SELECT * FROM profile where username= '$username' and password= '".md5($_POST['password'])."'");
  $returnuser = $mysqli->query("SELECT * FROM profile where username= '$username'");
  $returpassword = $mysqli->query("SELECT * FROM profile where password= '".md5($_POST['password'])."'");
  $row = mysqli_fetch_array($q);
if($q ->num_rows >0){
    $_SESSION['username'] = $username; 
    header('location:../otherFile/blogg.php'); }

else if($returnuser ->num_rows !=1){
     $_SESSION['error'] ="Wrong user name"; 
     header('location: error.php');
}
else if($returpassword ->num_rows !=1){
     $_SESSION['error'] ="Wrong password"; 
     header('location: error.php');
}
else if($returpassword ->num_rows !=1 && $returnuser ->num_rows !=1){
    $_SESSION['error'] ="Wrong username and password"; 
     header('location: error.php');
}
else{
    $_SESSION['error'] ="Login is unsuccessful try again";
    header('location: error.php'); 
} 
}
}

?>

                
            </div>
            
        </div>
        
        </div>

    </body>
</html>
         




