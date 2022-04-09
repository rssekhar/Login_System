<?php
if(isset($_POST['submit']) && isset($_FILES['myimg'])){
    require "dbconnect.php";
    // echo "File Uploaded";
    echo "<pre>";
    print_r($_FILES['myimg']);
    echo "</pre>";
    
    $img_name = $_FILES['myimg']['name'];
    $img_size = $_FILES['myimg']['size'];
    $img_type = $_FILES['myimg']['type'];
    $tmp_name = $_FILES['myimg']['tmp_name'];
    $error = $_FILES['myimg']['error'];
    
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