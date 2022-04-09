<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
     <!-- Bootstrap 4 cdn links: -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap 5 cdn links: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Icon links: -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- FontAwesome icon link: -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    
</head>
<body>
<?php
       
       if(isset($_POST['contact'])){
           require "dbconnect.php";
           $email = $_REQUEST['email'];
           //echo($email);
           $message = $_REQUEST['message'];

           $sql = "INSERT INTO contactdata(email,message) VALUES('$email','$message')";

           $result = mysqli_query($conn,$sql);
           if($result == 1){
               $voice = '<source src="./images/notification.m4a" type="audio/mpeg">';
               $notifi = '<audio autoplay="autoplay">' . $voice . '</audio>';
                echo($notifi);
            //header("Location:dashboard.php");
           }
           else{
               echo("<script>alert('Error Occured ,please try after sometime')</script>");
               header("Location:contact.php");

           }
       }
?>

    <div class="container">
        <?php include "menu.php";?>
        
        <hr>
        <div class="row" style="padding-top:70px;padding-bottom:70px;">
            <h3 class="text-center p-2">
                Contact Us
            </h3>
            <div class="col-12 col-md-6 col-lg-6 mb-2">
               <form action="contact.php" method="post">
                   <div class="form-group">
                       <label for="email">Email Id:</label>
                       <input type="email" name="email" id="email" class="form-control" required placeholder="Enter Your Correct Email Id">
                   </div>
                   <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea name="message" id="message"  style="resize: none;width: 100%;height: 120px;" placeholder="Type Your Message here if you have any doubts and face any issues please free to contact us for more support we are very happy to help you at anytime.... " required></textarea><br>
                    </div>
                    <input type="submit" value="Send Email" name="contact" id="contact" class="btn bg-danger text-white">
                    <hr>
                        <p>Contact Us For Business and More Info</p>
                        <p>Email Us : <a href="https://gmail.com/" class="text-decoration-none">sekharcreations19@gmail.com</a></p>
               </form> 
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <img src="./images/contact us.jpg" alt="contact" class="img-thumbnail m-auto d-block" width="100%" height="100%">
            </div>

        </div>

        <?php include "footer.php";?>
    </div>
    <script>
            function play1() {
                  
                  /* Audio link for notification */
                  var mp3 = '<source src="./images/notification.m4a" type="audio/mpeg">';
                 
                  '<audio autoplay="autoplay">' + mp3 + '</audio>';
              }
        </script>

</body>
</html>