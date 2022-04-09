<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>

    <!-- Bootstrap 4 cdn links: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- <link rel="stylesheet" href="style.css" /> -->
   
</head>
<body>
   
        <?php include "menu.php"?>
        <div style="padding-top:70px;padding-bottom:70px;">
        <img src="./images/portfolio.jpg" alt="design" width="100%" height="auto">

        </div>
        <?php include "footer.php"?>
    <!-- <div class="form">
        
    </div> -->
</body>
</html>