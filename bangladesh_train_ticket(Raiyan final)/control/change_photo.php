<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }
    $uname = "";
    $uname = $_SESSION['user'];
    $file_name = "";
    $filvalid = "";
    if(isset($_POST["change"]))
    {
        //VALIDATING FILE
        $target_dir = "../uploads/";
        $target_file = $target_dir . $uname.".jpg";

        $file_extention = explode(".",$_FILES["file"]["name"]);
        $file_extention = strtolower(end($file_extention));
        $allowed = array("jpg", "jpeg", "png");

        if(!empty($_FILES["file"]["name"]))
        {
            if(in_array($file_extention, $allowed))
            {
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
                {
                    $file_name = $uname;
                } 
                else 
                {
                    //$flag = 0;
                    $filvalid = "Sorry, there was an error uploading your file.";
                }
            }
            else
            {
                //$flag = 0;
                $filvalid = "Selected file must be photo";
            }
        }
        else
        {
            //$flag = 0;
            $filvalid = "Must select a photo";
        }
    }