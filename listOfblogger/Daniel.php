<?php
include '../functionfolder/connect.php';
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
                    <li><a href="../functionfolder/signIn.php" id="register">Sign in</a> </li>  
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
               <li><a href="../otherFile/blogg.php">Post Blogg</a> </li>
            </ul>
        </nav>
        </div>
        <div class="classthree">
            <div class="login" id="Login">
                <a href="../functionfolder/login.php" id="sigIn"><span class="fa fa-unlock-alt"></span>Login</a>
                <a href="../functionfolder/logout.php" id="sinOut"><span class="fa fa-sign-out"></span>Sign out</a>
           </div>
           
        </div>
        </div>
        <div class="body">
            <div class="left">
                <p>Left</p>   
 <?php 
 
 function returnFirstName(){
     include '../functionfolder/connect.php';
     $username = $_GET['id'];
     $sql = "SELECT *FROM profile where username ='$username'"; 
     $result = $mysqli -> query($sql); 
     while($row= $result->fetch_assoc()){
        return $row['firstName'];
     }
     
 }

function displayBlogg(){
include '../functionfolder/connect.php'; 
if(isset($_GET['id'])){  
$getUsername = $_GET['id']; 
$firstName = returnFirstName(); 
$q = $mysqli->query("SELECT * FROM blogg where username ='$getUsername'");
if($q == TRUE){
   while($row = mysqli_fetch_array($q)){
       echo '<a href="'.$firstName.'.php?'.'idtitle='.$row['bloggId'].'&id='.$row['username'].'" >'.$row['title']. '</a>';
       echo '<br/>'; 
   } 
}
else{
    echo $mysqli->error; 
}

}
}
displayBlogg(); 

  ?>

            </div> 
            
            <div class="middel">
                <p>middel</p>
                <?php
function displayEachBlogg(){
    include '../functionfolder/connect.php'; 
    if(isset($_GET['idtitle'])){
        $getID = $_GET['idtitle']; 
        $sql  = "SELECT b.created, b.title, b.bloggText, img.image\n"

            . "\n"

            . "FROM blogg b \n"

            . "\n"

            . "LEFT JOIN linkimagetoblogg link\n"

            . "\n"

            . "ON b.bloggId = link.bloggId\n"

            . "\n"

            . "LEFT JOIN image img\n"

            . "ON img.imageId = link.imageId\n"

            . "WHERE b.bloggId = '$getID'";

$result = $mysqli->query($sql);
    
 echo "<table id='blogtable'>";
 while($row= $result->fetch_assoc()){
        echo "<tr><td>"."<h1>". $row['title']."</h1>". "</td><td>"; 
        echo "<tr><td>". $row['bloggText']. "</td><td>"; 
  
        if($row['image'] == NULL){
            echo '';
        }
     
        else{
              echo "<tr><td>".'<img height="150" width="150" src=" '.$row['image'].'"/>';
             
        }
      
}
echo "</table>";

}
}
displayEachBlogg();

                
?>

                
            </div>
            
            <div class="right">
                <p>Right</p> 
            </div>
            
        </div>
        </div>
    </body>
</html>

