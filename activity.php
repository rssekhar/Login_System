<?php include "dbconnect.php"?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Data</title>
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
    <style>
        body{
            height:auto;
        }
        #activityform{
            
            border:1px solid black;
        }
        th,td{
            padding:10px;
        }
        b{
            color:red;
        }
    </style>
</head>

<body>
    
<div class="container">

   <?php include "menu.php"?>
    <div class="row">
    
    <div style="padding-top:70px;padding-bottom:10px;"> 
    <h3 class="text-center">Daily Activity</h3>
    <?php if(isset($_GET['error'])): ?>
        <p><?php echo($_GET['error']);?></p>
    <?php endif ?>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#activityform">Add Activity</button>
    <div class="modal" id="activityform">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Activity</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="insertactivity.php" method="post" name="activityform" enctype="multipart/form-data">
                    <b>* Required Fields</b><br />
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="id" hidden/>
                    </div>
                    <br />
                    
                    
                    <div class="form-group">
                        <label for="subject" class="form-label">Subject:</label><b>*</b><br />
                        <input type="text" class="form-control" name="subject" id="subject" required />
                    </div>
                    <br />

                    <div class="form-group">

                        <label for="topic" class="form-label">Today Topic:</label><b>*</b><br />
                        <input type="text" class="form-control" name="topic" id="topic" required />
                    </div>
                    
                    <br />
                    <div class="form-group">
                        <label for="sdate" class="form-label">Start Date:</label><b>*</b><br />
                        <input type="date" class="form-control" name="sdate" id="sdate" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="cdate" class="form-label">Complete Date:</label><b>*</b><br />
                        <input type="date" class="form-control" name="cdate" id="cdate" required />
                    </div>
                    <br />

                    <input type="submit" name="add_btn" class="btn btn-success" value="Add" style="float:right;"></input>
                </form>
                </div>
                
            </div>

        </div>

    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom:70px;">    
    <table id="activitydata" class="table-bordered table-hover" style="width:100%;text-align:center;">
            <thead>
                    <th>ID</th>
                    
                    
                    <th>Subject</th>
                    <th>Topic</th>
                    <th>Start Date</th>
                    <th>Complete Date</th>
                    <th colspan="2">Actions</th>
            </thead>
            <tbody>
            <?php

                $sql = "SELECT * FROM activitydata ORDER BY id DESC";
                $result = mysqli_query($conn,$sql);
                $cnt = 0;
               
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    
                    while($data = mysqli_fetch_assoc($result)) { $cnt++;
                        
                    ?>
                            
                        <tr><td><?php echo($cnt)?></td><td><?php echo($data['subject'])?></td><td><?php echo($data['topic'])?></td><td><?php echo($data['s_date'])?></td><td><?php echo($data['c_date'])?></td><td><a type="submit" href="edit.php?id=<?php echo($data['id']);?>" name="edit" class="btn btn-info text-decoration-none">Edit</a>&nbsp;<a type="submit" href="delete.php" name="del_btn" class="btn btn-danger text-decoration-none">Delete</a></td</tr>

                        <?php   
                        }
                }
                
                

            ?>

            
            </tbody>
       
        </tbody>
        
    
    </div>
    </div>
    <?php include "footer.php"?>
</div>

</body>

</html>