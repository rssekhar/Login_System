<?php include "dbconnect.php"?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Info</title>
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
    <?php 
        if(isset($_POST['add_btn'])){
            require "dbconnect.php";
            $department = $_POST['department'];
            $title = $_POST['title'];
            $location = $_POST['location'];
            $qualification = $_POST['qualification'];
            $jobtype = $_POST['jobtype'];
            $salary = $_POST['salary'];
            $sdate = $_POST['sdate'];
            $edate = $_POST['edate'];
            $applyfee = $_POST['applyfee'];
            $applylink = $_POST['applylink'];
           
            $sql = "INSERT INTO jobinfo(department,job_title,job_location,qualification,job_type,salary,start_date,end_date,apply_fee,apply_link) VALUES('$department','$title','$location','$qualification','$jobtype','$salary','$sdate','$edate','$applyfee','$applylink')";
            $result = mysqli_query($conn,$sql);
            if($result == 1){
                echo("<script>alert('job added successfully');</script>");
                header("Location:jobs.php");
            }
            else{
                echo("<script>alert('unable to add job details');</script>");
            }

            
        }
    
    ?>
<div class="container">

   <?php include "menu.php"?>
    <div class="row">
    
    <div style="padding-top:70px;padding-bottom:10px;"> 
    <h3 class="text-center">Recent Jobs</h3>
    <?php if(isset($_GET['error'])): ?>
        <p><?php echo($_GET['error']);?></p>
    <?php endif ?>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#jobform">Add Job</button>
    <div class="modal" id="jobform">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Job</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" name="activityform">
                    <b>* Required Fields</b><br />
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="id" hidden/>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="department" class="form-label">Department:</label><b>*</b><br />
                        <input type="text" class="form-control" name="department" id="department" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="title" class="form-label">Job Title:</label><b>*</b><br />
                        <input type="text" class="form-control" name="title" id="title" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="location" class="form-label">Job Location:</label><b>*</b><br />
                        <input type="text" class="form-control" name="location" id="location" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="qualification" class="form-label">Job Qualification:</label><b>*</b><br />
                        <input type="text" class="form-control" name="qualification" id="qualification" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="jobtype" class="form-label">Job Type:</label><b>*</b><br />
                        <select name="jobtype" id="jobtype" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Government">Government</option>
                            <option value="Private">Private</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="salary" class="form-label">Job Salary:</label><b>*</b><br />
                        <input type="text" class="form-control" name="salary" id="salary" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="sdate" class="form-label">Apply Start Date:</label><b>*</b><br />
                        <input type="date" class="form-control" name="sdate" id="sdate" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="edate" class="form-label">Apply End Date:</label><b>*</b><br />
                        <input type="date" class="form-control" name="edate" id="edate" required />
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="applyfee" class="form-label">Apply Fee:</label><b>*</b><br />
                        <input type="text" class="form-control" name="applyfee" id="applyfee" required />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="applylink" class="form-label">Apply Link:</label><b>*</b><br />
                        <input type="text" class="form-control" name="applylink" id="applylink" required />
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
        <table class="table-bordered table-hover" style="width:100%;text-align:center;">
                <thead>
                        
                        <th>Department</th>
                        <th>Job Title</th>
                        <th>Location</th>
                        <th>Qualification</th>
                        <th>Job Type</th>
                        <th>Salary</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Apply Fee</th>
                        <th>Apply Link</th>
                        <th>Action</th>
                </thead>
                <tbody>
                <?php

                    $sql = "SELECT * FROM jobinfo ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($data = mysqli_fetch_assoc($result)) { ?>
                        
                            <tr><td><?php echo($data['department'])?></td><td><?php echo($data['job_title'])?></td><td><?php echo($data['job_location'])?></td><td><?php echo($data['qualification'])?></td><td><?php echo($data['job_type'])?></td><td><?php echo($data['salary'])?></td><td><?php echo($data['start_date'])?></td><td><?php echo($data['end_date'])?></td><td><?php echo($data['apply_fee'])?></td><td><a class="text-decoration-none" href="<?php echo($data['apply_link']);?>"><?php echo($data['apply_link'])?></a></td><td><a href="deletejob.php" type="submit" name="del_btn" class="btn btn-danger text-decoration-none">Delete</a></td></tr>

                            <?php   
                            }
                            
                    }
                    
                    

                ?>

                
                </tbody>
        
            </tbody>
        </table>
    
        </div>
    </div>

    
    <?php include "footer.php"?>
</div>

<script>
    function changeUrl(){
        alert("url not redirected");
        var railway = document.getElementById("railway");
        //window.open('www.google.com');
    }
</script>
</body>

</html>