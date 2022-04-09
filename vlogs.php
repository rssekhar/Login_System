<?php include "dbconnect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body{
            /* display:flex;
            justify-content:center;
            align-items:center;
            flex-wrap:wrap;
            min-height:100vh;
            overflow:scroll; */
            height:auto;
            /* background-color:whitesmoke; */
        }
        
video{
            width:100%;
            height:100%;
            margin:0px;
            margin:0px auto;
            
        }
       
       
    </style>
</head>
<body>
<?php

if(isset($_POST['upload'])){
    require "dbconnect.php";
    $name = $_FILES['vfile'];
    
    // echo "File Uploaded";
    // echo "<pre>";
    // print_r($name);
    // echo "</pre>";
    //exit();
    $title = $_REQUEST['title'];
    $file_name = $_FILES['vfile']['name'];
    $file_size = $_FILES['vfile']['size']; //28,96,03,044
    $file_type = $_FILES['vfile']['type'];
    $tmp_name = $_FILES['vfile']['tmp_name'];
    $file_destination = "uploads/".$file_name;
    if($_FILES["vfile"]["size"] < 1000000){
        echo("<script>alert('file size must be less than 1gb');</script>");
    }
    else{
        $sql ="INSERT INTO movies(video_url,title) VALUES ('$file_name','$title')";
   // $sql ="INSERT INTO movies(title,video_url) VALUES ('$file_name','$title')";
    $result = mysqli_query($conn,$sql);
    if($result == TRUE){
        move_uploaded_file($tmp_name,$file_destination);
        
        echo("<script>alert('video upload successfully');</script>");

    }
    else{
        echo("error occured");
    }
    }
    //$error = $_FILES['vfile']['error'];
    
    
       
        //if($result == TRUE){
        //}
        //else{
           // echo("<script>alert('not upload error occured');</script>")
    
        //}
   
    }
    
    ?>
<div class="container">
        <?php include "menu.php"?>
            <div class="row">
        

            <div style="padding-top:70px;padding-bottom:10px;">
                <h3 class="text-center">Movies</h3>
                    <?php if(isset($_GET['error'])): ?>
                    <p><?php echo($_GET['error']);?></p>
                    <?php endif ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#imageform">Add Video</button>
                <div class="modal" id="imageform">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add New Movie</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="vlogs.php" method="post" enctype="multipart/form-data">
                            
                            <b>* Required Fields</b><br />
                            <div class="form-group">
                                <label for="title" class="form-label">Title:</label><b>*</b><br />
                                <input type="text" class="form-control" name="title" id="title" required />
                            </div>
                            <br />
                            <div class="form-group">
                                
                                <label for="image" class="form-label">Upload Movie:</label><b>*</b><br />
                                <input type="file" class="form-control" name="vfile" id="vfile" type="video/mkv" required />
                            </div>
                            <br />
                            <input type="submit" class="btn btn-success" name="upload" value="Upload">
                            </form>
                        </div>
                    </div>
                </div>
                    <!-- <input type="text" name="title" id="title" required>
                    <input type="file" name="myimg" id="myimg">
                    <input type="submit" class="btn btn-success" name="submit" value="Upload">
         -->

                </div>
            </div>


        
        <div class="row" style="padding-bottom:70px;">

            <!-- <a href="index.php">&#8592;</a> -->
            <?php
                $sql = "SELECT * FROM movies ORDER BY id DESC";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    // echo "data received";
                    while($images = mysqli_fetch_assoc($result)){ ?>
                        <div class="col-md-4">
                        <div class="thumbnail">
                        <video style="width:100%;height:200px;padding:10px;" controls>
                            <source src="uploads/<?=$images['video_url']?>">
                        </video>
                            <div class="caption">
                            <h5 class="text-center" style="text-transform:capitalize;"><?php echo($images['title'])?></h5>

                            </div>
                        
                        </div>
                        </div>
                    <?php
                        
                    }
                    
                }
        
            ?>

        </div>
    <?php include "footer.php"?>
</div>
</body>
</html>