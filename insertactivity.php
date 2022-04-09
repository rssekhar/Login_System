<!DOCTYPE html>
<html>
<body>
<?php

if(isset($_POST['add_btn'])){

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "files";
    
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name);
    
    if($conn->connect_error){
        die("connection failed");
    }
    
    //$name = $_REQUEST['fullname'];
    //$email = $_REQUEST['emailid'];
   
    $subject = $_REQUEST['subject'];
    $topic = $_REQUEST['topic'];
    $sdate = $_REQUEST['sdate'];
    $cdate = $_REQUEST['cdate'];
   
    $sql = "INSERT INTO activitydata(subject,topic,s_date,c_date) VALUES('$subject','$topic','$sdate','$cdate')";
    
    
    if($conn->query($sql) == TRUE){
        
            echo "activity added succesfully";
            header("Location:activity.php");
        }
        else{
            echo "unable to add activity";
        }

    
    $sql = "SELECT * FROM activitydata WHERE id={$id}";
        if(!empty($ID)){
                    $sql = "DELETE FROM activitydata WHERE id={$ID}";
                    
                    if(mysqli_query($conn,$sql) === TRUE){
                        echo "Activity Deleted Successfully";
                    }
                    else{
                        echo "Unable to Delete";
                    }
                }
                else{
                    echo "Please Fill All Fields";
                }

    // get data
    //delete data
    
    //$conn->close();
}
?>

</body>

</html>