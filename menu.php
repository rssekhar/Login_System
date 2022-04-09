<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    
    <!-- Bootstrap 4 cdn links: -->
    <!-- Bootstrap 5 cdn links: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icon links: -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- FontAwesome icon link: -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <!-- <div class="row">
            <h3 class="text-center">All In One</h3>

        </div> -->
        <!-- <div class="row">

        -->
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-justify-content-center text-black" id="myNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="activity.php" class="nav-link">Activity</a>
                           
                        </li>
                        <li class="nav-item">
                            <a href="photostock.php" class="nav-link">Photostock</a>
                        </li>
                        <li class="nav-item">
                            <a href="vlogs.php" class="nav-link">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a href="jobs.php" class="nav-link">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a href="portfolio.php" class="nav-link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link">Contact Us</a>
                        </li>
                        <li class="nav-item dropdown" style=".dropdown:hover .dropdown-menu {display: block;}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fas fa-solid fa-bell text-danger" style="font-size:20px;"></i>
                                <sup>
                                    <?php
                                    //if(isset($_POST['submit'])){
                                       
                                        require "dbconnect.php";
                                       //$id=$_GET['id'];
                                        $sql = "SELECT COUNT(id) as count FROM contactdata";
                                       
                                        $result = mysqli_query($conn,$sql);
                                       
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)) {
                                              
                                        ?>
                                            <sup style="font-size:16px;"><?php echo($row['count']);?></sup>
                                            
                                        <?php

                                        }
                                    }
                                        //$aa = is_array($aa) ? count($aa) : 0 ;
                                        ?>
                                        
                                </sup>
                            </a>  
                            <div class="dropdown-menu" style="height:200px;overflow-y:scroll;">
                                <?php
                                    require "dbconnect.php";
                                    $sql = "SELECT * FROM contactdata";
                                    $result = mysqli_query($conn,$sql);
                                    $cnt = 0;
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $cnt++;
                                            ?>
                                         <a class="dropdown-item" href="#"><div><?php echo($cnt);?><br><?php echo($row['email']);?><br><?php echo($row['message']);?></div></a>

                                            <?php
                                        }
                                    }

                                ?>
                                
                            </div>
                        </li>
                        
                        <li class="nav-item">
                                <!-- <p>Hey, !&nbsp;</p> -->
                                <!-- <p>You are now user dashboard page.</p> -->

                                <a href="logout.php" class="btn btn-basic nav-link text-decoration-none"><i class="fas fa-user"></i>&nbsp; Logout</a>
                        </li>

                    </ul>
                </div>
    
            </nav>
        <!-- </div> -->
        
    </div>
    
</body>

</html>