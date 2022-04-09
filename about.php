<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
    <div class="container">
        <?php include "menu.php";?>
        
        <hr>
        <div class="row" style="padding-top:70px;padding-bottom:70px;">
            <h3 class="text-center p-2">
                About Us
            </h3>
            <div class="col-12 col-md-6 col-lg-6">
                <img src="./images/welcome.jpg" class="img-thumbnail m-auto d-block" alt="myImage" width="100%" height="100%">
            </div>
            <div class="col-12 col-md-6 col-lg-6" style="align-self: center;">
                <h4 class="text-center">Personal Information</h4>
                <p class="text-justify">
                    I am R Soma Sekhar from Srikakulam,it is located at Andhra Pradesh.And I completed B-Tech in the
                    stream of Computer Science and Engineering at
                    Sri Krishna Devaraya University in Anantapur.And Coming to family i have Father,Mother and they do
                    farming for living and i have a brother.

                <p class="text-justify">
                    Along with my degree i learnt Web Development and i also
                    have skills in
                    blogging by using WordPress,Blogger,Video Editing and Photoshop.
                </p>
                <p class="text-justify">
                    For More Info About My Work & Skills You Can check my <a href="portfolio.php" class="text-decoration-none"> Online Profiles Here:</a><br>
                <p class="text-left">LinkedIn: <a class="text-decoration-none"
                        href="https://www.linkedin.com/in/r-s-sekhar-9415a6173">
                        https://www.linkedin.com/in/r-s-sekhar-9415a6173 </a><br>
                    Code Pen: <a class="text-decoration-none"
                        href=" https://codepen.io/rs_sekhar">https://codepen.io/rs_sekhar</a>
                </p>
                <a href="contact.php" class="btn btn-danger text-decoration-none">Contact Us</a>
            </div>

        </div>

        <?php include "footer.php";?>
    </div>
</body>
</html>