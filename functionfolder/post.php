<?php
include 'connect.php';
session_start();
?>


<?php
function uplodeBlogg(){
    include 'connect.php';
    if(isset($_POST['uplodeblog'])){
        $username = $_SESSION['username']; 
        $title = $_POST['title'];
        $BlogId = $_POST['bloggId']; 
        $blogg = $_POST['blogg'];
        if(empty($blogg)  OR empty($BlogId) OR empty($title)){
               $_SESSION['error'] = 'Fields are required';
               header('Location:error.php');
               
        }
        else{
            $query = $mysqli ->query("INSERT INTO blogg (bloggId, title, username, bloggText)VALUES('$BlogId', '$title','$username', '$blogg')"); 
            if($query == TRUE){
                echo "New record created successfully";
                header('Location:../otherFile/blogg.php');
                
            }
            else {
                $_SESSION['error'] = $mysqli -> error;
                header('Location:error.php');
}
    }
       
} 
    }
 uplodeBlogg();     
    
function uplodeImage(){
    include 'connect.php';
    if(isset($_POST['uplodeimage'])){
    $dir = "image/"; 
    $file=  $_FILES['photo']['name'];
    $fileTemp = $_FILES['photo']['tmp_name'];
    $file_basemanet = basename($_FILES['photo']['name']); 
    $final_dir = $dir.$file_basemanet; 
    move_uploaded_file($fileTemp, $final_dir); 
    $BlogId = $_POST['bloggId']; 
    $imageId = $_POST['imageid']; 
    $filename = $_POST['fileName']; 
    if(empty($BlogId) OR empty($imageId) OR empty($filename) OR empty($final_dir)){
      $_SESSION['error'] = 'Fields are required';
       header('Location:error.php');
    }
    else{
     $query = $mysqli ->query("INSERT INTO image (imageId, fileName,image)VALUES('$imageId', '$filename','$final_dir')"); 
     $linkquery = $mysqli ->query("INSERT INTO linkimagetoblogg (imageId,bloggId)VALUES('$imageId', '$BlogId')");
     if ($query === TRUE && $linkquery == TRUE) {
     $_SESSION['sucess'] ="New image uploaded successfully";
     header('Location:sucess.php');
    
     } else {
       $_SESSION['error'] = $mysqli -> error;
       header('Location:error.php');
}
    }
       
} 
    }
  uplodeImage(); 
  
  
  function returnFirstName(){
     include '../functionfolder/connect.php';
     $username = $_SESSION['username'];
     $sql = "SELECT *FROM profile where username ='$username'"; 
     $result = $mysqli -> query($sql); 
     while($row= $result->fetch_assoc()){
        return $row['firstName']. " ". $row['lastName'];
     }
     
     $mysqli -> close();
 }
  
  function returnBloggTitle($bloggId){
     include '../functionfolder/connect.php';
     $sql = "SELECT *FROM blogg where bloggId ='$bloggId'"; 
     $result = $mysqli -> query($sql); 
     while($row= $result->fetch_assoc()){
       return $row['title'];
     }
     $mysqli->close();
 }
  
  function presentPost(){
      include '../functionfolder/connect.php';
      if(isset($_POST['submittpresnt'])){
        $username = $_SESSION['username'];
        $title = returnBloggTitle($_POST['presentBloggId']);
       echo $title;
        $fullname = returnFirstName();
        echo $fullname;
        $BlogId = $_POST['presentBloggId'];
         // $BlogId;
        $presentation = $_POST['presntBlogg'];
        //echo $presentation;
        $presntImageID = $_POST['presntImageId'];
        //echo $presntImageID;
        if(empty($presntImageID)  OR empty($BlogId) OR empty($title) OR empty($presentation)){
               $_SESSION['error'] = 'Fields are required';
              //header('Location:error.php');
               
        }
        else{
            $query = $mysqli ->query("INSERT INTO page  (bloggId, title, username, fullname, presentation, imageId)"
                    . "VALUES('$BlogId', '$title','$username', '$fullname', '$presentation', '$presntImageID')"); 
            if($query == TRUE){
                echo "New presentation created successfully";
              //header('Location:../otherFile/blogg.php');
                
            }
            else {
                $_SESSION['error'] = $mysqli -> error;
                echo $mysqli -> error;
               // header('Location:error.php');
}
    }
       }
        $mysqli->close();
      
} 
      
presentPost(); 

?>

