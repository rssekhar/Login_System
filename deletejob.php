
<?php


    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "files";
    
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name);
    
    if($conn->connect_error){
        die("connection failed");
    }
    echo "delete data availble here";
    // insert data

    $sql = "SELECT * FROM jobinfo ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($data = mysqli_fetch_assoc($result))
        $id = $data['id'];
        echo("your id is".$id);
        $sql = "DELETE FROM jobinfo WHERE id={$id}";
        if(mysqli_query($conn,$sql) === TRUE){
            echo "<script>alert('Job Deleted Successfully');</script>";
            header("Location:jobs.php");
        }
        else{
            echo "<script>alert('Unable to Delete Job Info');</script>";
        }
    }
    
    $conn->close();

?>
