<?php
include '../functionfolder/connect.php';
session_start(); 
if(!isset($_SESSION['username'])){    // check session set 
    header('location:../index.php');  // if is not set direct page to index page 
}
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
                 <li><a href="design.php">News</a> </li>
                 <li><a href="service.php">Service </a> </li>
                 <li><a href="marketing.php">Marketing</a> </li>
                 <li><a href="product.php">Product</a> </li>
                 <li><a href="blogg.php">Post blogg</a> </li>
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
            <div class="view">
                <h2>View here</h2>    
               
 <?php 
function userBlogg(){
    include '../functionfolder/connect.php';
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $sql  = "SELECT b.bloggId, b.title, b.bloggText, img.imageId, img.image\n"

    . "    FROM blogg b \n"

    . "    LEFT JOIN linkimagetoblogg link \n"

    . "    ON b.bloggId = link.bloggId\n"

    . "    LEFT JOIN image img\n"

    . "    ON img.imageId = link.imageId\n"

    . "    WHERE b.username = '$username'";
$result = $mysqli->query($sql);
    
 echo "<table id='blogtable'>";
 while($row= $result->fetch_assoc()){
        echo "<tr><td>". $row['bloggId']. "</td><td>";
        echo "<tr><td>"."<h1>". $row['title']."</h1>". "</td><td>"; 
        echo "<tr><td>". $row['bloggText']. "</td><td>"; 
  
        if($row['image'] == NULL){
            echo '';
        }
     
        else{
              echo "<tr><td>".'<img height="150" width="150" src=" '.$row['image'].'"/>';
              echo "<tr><td>"."<button><a href='../functionfolder/delete.php?id=".$row['imageId']."'>"."Delete: "."  ".$row['imageId']."</a></button>"."</td></tr>";
             
        }
       echo "<tr><td>"."<button><a href='../functionfolder/delete.php?id=".$row['bloggId']."'>DeleteBlogg</a></button>"."</td></tr>";
      
}
echo "</table>";
$mysqli -> close(); 
 }   
 
}
 
 userBlogg();
 

 
 
  ?> 
      
            </div> 
            <div class="edit">
                <h2> Edit post</h2>
                <div class="edittitle">
                    <h3> Edit title</h3>
                    <button id="editTitle">Please click here to edit title</button>
                    <form action="../functionfolder/edit.php" method="POST" class="form" id="edittitle">
                    <div>
                    <label>Blogg ID</label>
                    <input type="text" name="bloggId" id="bloggId"><br> 
                    <label> Title</label>
                    <input type="text" name="title" id="title"><br> 
                    </div>
                     <div>  
                         <input type="submit"  name="edit" value="edit">
                    </div> 
                </form> 
                </div>
                <div class="editbloggText">
                    <h3> Edit BloggText</h3>
                    <button id="editText">Please click here to edit Text</button>
                    <form action="../functionfolder/edit.php" method="POST" class="form" id="editbloggText">
                    <div>
                    <label>Blogg ID</label>
                    <input type="text" name="bloggID" id="bloggID"><br> 
                    <div>
                         <textarea type="text" cols="40" rows="20" name="bloggEdit"> </textarea>
                    </div>
                    </div>
                     <div>  
                         <input type="submit"  name="editText" value="Edit Text">
                    </div> 
                </form> 
                </div>
                <div class="page">
                    <h3> Presentation</h3>
                    <button id="pB">Click here: Present blogg</button>
                   <form action="../functionfolder/post.php" method="POST" class="form" id="PB">
                    <div>
                    <label>Blogg ID</label>
                    <input type="text" name="presentBloggId" id="presentBloggId"><br> 
                    <label>Image ID</label>
                    <input type="text" name="presntImageId" id="presentImageId"><br> 
                    <div>
                         <textarea type="text" cols="25" rows="10" name="presntBlogg"> </textarea>
                    </div>
                    </div>
                     <div>  
                         <input type="submit"  name="submittpresnt" value="PresentBlogg">
                    </div> 
                </form> 
                </div>
            </div>
            
            <div class="uplode">
                <div class="postBlog">
                    <h2>Post blogg</h2>
                    <button id="uplode">Click here: uplodeBlogg </button>
                <form action="../functionfolder/post.php" method="post" class="form" id="uplodeB">
                    <div>
                     <label>Blog ID</label>
                    <input type="text" name="bloggId" id="bloggId"><br> 
                    </div>
                    <div>
                     <label> Title</label>
                    <input type="text" name="title" id="title"><br> 
                    </div>
                     <div>
                         <textarea type="text" cols="40" rows="20" name="blogg"> </textarea>
                    </div>
                     <div>  
                         <input type="submit"  name="uplodeblog" value="Uplode Blogg">
                    </div> 
                </form> 
                </div>
                <div class="postimage">
                 <h2>Uplode Image</h2>
                 <button id="uplodeI">Click here: uplode Image </button>
                 <form action="../functionfolder/post.php"enctype="multipart/form-data" method="post" class="form" id="uplodeIM">
                    <label> Image ID</label>
                    <input type="text" name="imageid" id="imageid"><br>
                    <label>Blog ID</label>
                    <input type="text" name="bloggId" id="bloggId"><br> 
                    <label> fileName</label>
                    <input type="text" name="fileName" id="fileName"><br>
                     <div class="uplodeimage">  
                         <input type="file" name="photo">
                         <input type="submit"  name="uplodeimage" value="Uplode image">
                    </div> 
                </form>
            </div>
            </div>
            
            
                 
            
            
        </div>
        </div>   
    </body>
</html>
 
   
             


