<?php
    session_start();
    include("../model/db.php");
    $uname = $_SESSION['user'];
    
    $writ = "";
    $plese = 1;

    if(isset($_POST["submit_feedback"]))
    {
        if($_POST["comment"] != "")
        {
            $my = new db();
            $con = $my->openCon();
            $my->insertComments("customer_feedback", $uname, date("Y/m/d"), $_POST["comment"], $con);
            $my->connClose($con);
            $writ = "Comment Submitted Succesfully";
        }
        else
        {
            $writ = "You need to write something";
        }
    }
?>