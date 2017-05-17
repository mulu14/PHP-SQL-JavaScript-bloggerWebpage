$(document).ready(function(){
  
 $("#sinOut").hide(); // hide signout function by default; 
 
  $.ajax({
            url:'http://localhost/blogger/functionfolder/session.php',
            type: 'POST',
            dataType: 'json',
            success:function(data){
                console.log(data.username);
                $("#sigIn").hide();
                $("#register").hide(); 
                $("#sinOut").show(); 
            },
            error: function (error){

            }
        });
 $("#edittitle").hide();
 $("#editbloggText").hide();  
 $("#PB").hide();  
 $( "#uplodeB").hide();
 $("#uplodeIM").hide(); 
  
 
 $("#editTitle" ).click(function() {
  $( "#edittitle" ).toggle();
});       
$( "#editText" ).click(function() {
  $( "#editbloggText" ).toggle();
});
$( "#pB" ).click(function() {
  $( "#PB" ).toggle();
});
$( "#uplode" ).click(function() {
  $( "#uplodeB" ).toggle();
}); 

$( "#uplodeI" ).click(function() {
  $( "#uplodeIM" ).toggle();
});


   

});