<?php
include 'functionfolder/connect.php';
session_start(); 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/project.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="" type="text/css" />
        <script src="javscript/login.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
        
        <div class="header">
        <div class="classone">
          
            <div class="signin">
                <ul
                    <li><a href="functionfolder/signIn.php" id="register">Sign in</a> </li>  
                </ul>
             
            </div>
            <div class="logo">
             <img src="image/blogger.jpg"  alt="logo" >    
           </div>
        </div>
        <div class="classtwo">
            <nav>
             <ul>
                 <li><a href="index.php"> Home </a> </li>
                 <li><a href="otherFile/design.php">News</a> </li>
                 <li><a href="otherFile/service.php">Service </a> </li>
                 <li><a href="otherFile/marketing.php">Marketing</a> </li>
                 <li><a href="otherFile/product.php">Product</a> </li>
                 <li><a href="otherFile/blogg.php">Post blogg</a> </li>
            </ul>
        </nav>
        </div>
        <div class="classthree">
            <div class="login" id="Login">
                <a href="functionfolder/login.php" id="sigIn"><span class="fa fa-unlock-alt"></span>Login</a>
                <a href="functionfolder/logout.php" id="sinOut"><span class="fa fa-sign-out"></span>Sign out</a>
           </div> 
        </div>
        </div>
        <div class="body">
            <div class="left">
                <h2> Active bloggers</h2>
                
<?php 
function ListBlogger(){
    include  'functionfolder/connect.php';
    $q = $mysqli->query("SELECT * FROM profile"); // select profile table
     while($row = mysqli_fetch_array($q)){   // While there is row from 
     echo '<a href="listOfblogger/'.$row['firstName'].'.php?'.'id='.$row['username'].'" >'.$row['firstName']. "  ".$row['lastName'].'</a>';
     echo '</br>';
}
    
}
ListBlogger(); 
?>
                
    </div> 
            
            <div class="middel">
                <h2>Latest Bloggs </h2>  
                              
 <?php 
 function displayBlog(){
     include 'functionfolder/connect.php';
        $sql  = "SELECT * from blogg ORDER BY created DESC";

        $result = $mysqli->query($sql);  
        
         while($row= $result->fetch_assoc()){
                echo '<h3>'. $row['title'].'</h3>'; 
                echo "<p>". $row['created']. "</p>";
                echo "<p>". substr($row['bloggText'],0, 50). "</p>";
         }
          $mysqli->close();
         }
 displayBlog(); 

  ?> 
 
            
        </div>
            
            <div class="right">
               
                <h2> Notice </h2>
                <p> Welcome new blogger </p>
                <p> Create account by clicking sign link on top right of the page </p>
                <p> Please login before Post blogg </p>
                <p> You can only access to Post blogg once you login </p>
            </div>
         
        </div>
     
   </div>
    </body>
</html>
         



