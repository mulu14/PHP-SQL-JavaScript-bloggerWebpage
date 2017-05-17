<?php
include 'connect.php';
session_start(); 
?>

    
    
      

<?php
function editTitle(){
    include 'connect.php';
    if(isset($_POST['edit'])){
        if(empty($_POST['title']) OR empty($_POST['bloggId'])){
            $_SESSION['error'] ="User input is required"; 
            header('Location:error.php'); 
        }
        
            else{
        
                $newTitle = $_POST['title'];
                $bloggid = $_POST['bloggId'];
                $sql = "UPDATE blogg SET title='$newTitle' where bloggId='$bloggid'";
                $result = $mysqli->query($sql);
                if($result == TRUE){
                    $_SESSION['sucess'] ='You edit title sucessfully';
                    header('Location:sucess.php'); 
                }
                else{
                   $_SESSION['error'] ='There is problem in editing title';
                   header('Location:error.php');
                }
           
            }
        
}
}
editTitle(); 

function editBloggText(){
    include 'connect.php';
    if(isset($_POST['editText'])){
        if(empty($_POST['bloggID'])){
            $_SESSION['error'] ="User input is required"; 
            header('Location:error.php'); 
        }
        
            else{
        
                $newText = $_POST['bloggEdit'];
                $bloggid = $_POST['bloggID'];
                $sql = "UPDATE blogg SET bloggText='$newText' where bloggId='$bloggid'";
                $result = $mysqli->query($sql);
                if($result == TRUE){
                    $_SESSION['sucess'] ='You edit text sucessfully';
                    header('Location:sucess.php'); 
                }
                else{
                   $_SESSION['error'] ='There is problem in editing title';
                   header('Location:error.php');
                }
           
            }
        
}
}
editBloggText(); 

?>
