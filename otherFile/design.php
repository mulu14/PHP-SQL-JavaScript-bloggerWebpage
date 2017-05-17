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
            <class class="left">
                <h2>Left</h2>   
           
            </class> 
            
            <class class="middel">
                <p>middel</p>
            The heir to a multi-million pound fortune has claimed he single-handedly fought off a 'laughing' balaclava-clad axe murderer who butchered his entire family in their beds.
Henri van Breda is accused of murdering father Martin, mother Teresa, brother Rudi and attempting to kill sister Marli in Cape Town in 2015.
If acquitted, he stands to inherit part of his family's £12million fortune they amassed from property deals while living in Australia.
In court on Monday the 21-year-old pleaded not guilty, claiming he watched helpless through a crack in a bathroom door as a silhouetted man wielding an axe murdered his loved ones.

            </class>
            
            <class class="right">
                <p>Right</p> 
            </class>
    
        </div>
        </div>
    </body>
</html>
 