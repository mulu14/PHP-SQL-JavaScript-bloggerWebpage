<?php

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
               <li><a href="../otherFile/blogg.php">Post bloggp</a> </li>
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
             
<?php 
function displayBlogg(){
include '../functionfolder/connect.php'; 
if(isset($_GET['id'])){  
$getUsername = $_GET['id']; 
$q = $mysqli->query("SELECT * FROM blogg where username ='$getUsername'");
if($q == TRUE){
   while($row = mysqli_fetch_array($q)){
       echo '<a href="Mulugeta.php?'.'idtitle='.$row['bloggId'].'&id='.$row['username'].'" >'. $row['title']. '</a>'; 
       //echo '<a href="'.$row['firstName'].'.php?'.'idtitle='.$row['bloggId'].'&id='.$row['username'].'" >'.$row['title']. '</a>';
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
    
 while($row= $result->fetch_assoc()){
        echo '<h1>'. $row['title'].'</h1>'; 
        echo "<p>". $row['bloggText']. "</p>"; 
  
        if($row['image'] == NULL){
            echo '';
        }
     
        else{
              echo '<img height="150" width="150" src=" '.base64_encode($row['image']).'"/>';
              
             
        }
      
}
echo '</div';

}
}
displayEachBlogg();

                
?>
                
            </div>
            
            <div class="right">
               
                <?php 
                function pageDisplay(){
                    include '../functionfolder/connect.php'; 
                    if(isset($_GET['idtitle']) && isset($_GET['id'])){
                        $idtitle = $_GET['idtitle']; 
                        $iduser = $_GET['id']; 
                        $sql  = "SELECT * FROM page WHERE username ='$iduser' and bloggId='$idtitle'";
                        $result = $mysqli->query($sql);
                        while($row= $result->fetch_assoc()){
                            echo '<h2>'.' ' . $row['title'].'</h2>';
                            echo '<br/>'; 
                             echo '<br/>'; 
                            echo '<span>'.'Posted at: '.' '. $row['created'].'</span>';
                            echo '<br/>'; 
                             echo '<br/>'; 
                            echo '<span>'.'Blog ID:'.''. $row['bloggId'].'</span>';
                            echo '<br/>';
                             echo '<br/>'; 
                            echo '<span>'.'User name: '. ' '.$row['username'].'</span>';
                            echo '<br/>';
                             echo '<br/>'; 
                            echo '<span>'.'Bloger: '.' '. $row['fullname'].'</span>';
                            echo '<br/>'; 
                            echo '<br/>'; 
                            echo '<span>'.'Summery: '.''.$row['presentation'].'</span>';

                    }
                    }
                    
                }
                
                pageDisplay(); 
                ?>
            </div>
            
        </div>
        </div>
    </body>
</html>

