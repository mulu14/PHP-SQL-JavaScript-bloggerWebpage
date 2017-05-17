<?php

function displayHistoryBlogg(){
  include '../functionfolder/connect.php';  
  
$getTitle = $_GET['idtitle']; 
$q = $mysqli->query("SELECT * FROM blogg where title ='$getTitle'");
if($q == TRUE){
   while($row = mysqli_fetch_array($q)){
        echo "<p>". $row['title']. "</p>"; 
        echo "<p>". $row['bloggText']. "</p>"; 
        if($row['image'] =='image/'){
            echo ''; 
        }
        else{
              echo '<img height="150" width="150" src=" '.$row['image'].'"/>';
        }        
} 
}
else{
    echo $mysqli->error; 
}

}
displayHistoryBlogg(); 



?>