<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
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
<body>
    
<?php
include "dbconnect.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    //echo($_GET['id']);
    //echo("connected");
    $sql = "SELECT * FROM activitydata WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          //echo("<br>id is:".$row['id']."<br>and name is".$row['name']);
         
          
          $subject = $row['subject'];
          $topic = $row['topic'];
          $sdate = $row['s_date'];
          $cdate = $row['c_date'];
          ?>
          <!-- ----------update form -->
        <?php include "menu.php"?>
            <div style="padding-top:70px;padding-bottom:70px;">
            <h3 class="text-center">Update Form</h3>
            
          <form method="post" id="uform" style="width:360px;height:100%;margin:0px auto;padding:10px;border:1px solid black;border-radius:10px;">
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="id" hidden/>
                    </div>
                    <br />
                    
                    <div class="form-group">
                        <label for="subject" class="form-label">Subject:</label>
                        <input type="text" class="form-control" name="subject" id="subject" required value="<?php echo($subject); ?>"/>
                    </div>
                    <br />

                    <div class="form-group">

                        <label for="topic" class="form-label">Topic:</label>
                        <input type="text" class="form-control" name="topic" id="topic" required value="<?php echo($topic); ?>"/>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="sdate" class="form-label">Start Date:</label><b>*</b><br />
                        <input type="date" class="form-control" name="sdate" id="sdate" required value="<?php echo($sdate);?>" disabled/>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="cdate" class="form-label">Complete Date:</label><b>*</b><br />
                        <input type="date" class="form-control" name="cdate" id="cdate" required value="<?php echo($cdate);?>"/>
                    </div>
                    <br />
                                        
                    <div class="form-group">
                        <input type="submit" name="update" class="btn btn-success" value="Update"></input>
                    </div>
                </form>
                </div>
        <?php include "footer.php"?>
          <!-- //---------------- -->
          <?php
        }
        //echo($sql);
        //echo("id data fetched");
    }
    else{
        echo("error in sql");
    }

}
else{
    echo("not connected");
}
if(isset($_POST['update'])){
    $id=$_GET['id'];
    $subject = $_POST['subject'];
    $topic = $_POST['topic'];
    //$sdate = $_POST['sdate'];
    $cdate = $_POST['cdate'];
    // $job = $_POST['job']; 
    echo("you update id is<h4> $id </h4>");
    $sql = "UPDATE activitydata SET subject='$subject',topic='$topic',c_date='$cdate' WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    if($result == 1){
        echo("<script>alert('Update Successfully');alert('Check Your Activity Page.');</script>");
    }
    else{
        echo("erro in sql update syntax");
    }
}
else{
    echo("<br>error in update and not connected");
}
$conn->close();
?>
</body>
</html>
