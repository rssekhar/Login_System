<?php
require "dbconnect.php";
if(isset($_POST['upload'])){
    $name = $_FILES['vfile'];
    
    // echo "File Uploaded";
    echo "<pre>";
    print_r($name);
    echo "</pre>";
    exit();
    $title = $_REQUEST['title'];
    $file_name = $_FILES['vfile']['name'];
    $file_size = $_FILES['vfile']['size'];
    $file_type = $_FILES['vfile']['type'];
    $tmp_name = $_FILES['vfile']['tmp_name'];
    $file_destination = "upload/".$file_name;
    //$error = $_FILES['vfile']['error'];
    if(move_uploaded_file($tmp_name,$file_destination)){
        $sql ="INSERT INTO movies(title,video_url) VALUES ('$file_name','$title')";

        if(mysqli_query($conn,$sql)){
            echo("<script>alert('video upload successfully');</script>")
        }
        else{
            echo("<script>alert('not upload error occured');</script>")
    
        }
    }
    if($error === 0){
        if($img_size > 125000){
            $em = "Sorry, Your file is too large";
            header("Location:photostock.php?error=$em");
        }
        else{
            //echo "Not More than 1mb";
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            //echo($img_ex);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg","jpeg","png");

            if(in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);
                $title = $_REQUEST['title'];
                //insert into database
                $sql = "INSERT INTO images(title,image_url) VALUES('$title','$new_img_name')";
                mysqli_query($conn,$sql);
                header("Location:photostock.php");
            }else{
                $em = "You can't upload this type of files";
                header("Location:photostock.php?error=$em"); 
            }
        }

    }
    else{
        $em = "unknown error occured";
        header("Location:photostock.php?error=$em");
    }
}else{
    header("Location:photostock.php");
}
?>