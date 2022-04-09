<?php include "dbconnect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos</title>
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
        
        img{
            width:100%;
            height:100%;
            margin:0px;
            margin:0px auto;
            
        }
       
       
    </style>
</head>
<body>
<div class="container">
        <?php include "menu.php"?>
            <div class="row">
        

            <div style="padding-top:70px;padding-bottom:10px;">
                <h3 class="text-center">Images</h3>
                    <?php if(isset($_GET['error'])): ?>
                    <p><?php echo($_GET['error']);?></p>
                    <?php endif ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#imageform">Add Image</button>
                <div class="modal" id="imageform">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add New Image</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                            
                            <b>* Required Fields</b><br />
                            <div class="form-group">
                                <label for="title" class="form-label">Title:</label><b>*</b><br />
                                <input type="text" class="form-control" name="title" id="title" required />
                            </div>
                            <br />
                            <div class="form-group">
                                
                                <label for="image" class="form-label">Upload Image:</label><b>*</b><br />
                                <input type="file" class="form-control" name="myimg" id="myimg" required />
                            </div>
                            <br />
                            <input type="submit" class="btn btn-success" name="submit" value="Upload">
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
                $sql = "SELECT * FROM images ORDER BY id DESC";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    // echo "data received";
                    while($images = mysqli_fetch_assoc($result)){ ?>
                        <div class="col-md-4">
                        <div class="thumbnail">
                        <a href="uploads/<?=$images['image_url']?>" target="_blank" type="application/pdf"><img src="uploads/<?=$images['image_url']?>" style="width:100%;height:200px;padding:10px;"></a>
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